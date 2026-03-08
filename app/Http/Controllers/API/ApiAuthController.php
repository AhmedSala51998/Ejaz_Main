<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\auth\RegisterRequest;
use App\Http\Actions\ingaz\UserAction as ObjAction;
use App\Http\Requests\ingaz\auth\LoginRequest;
use App\Http\Requests\ingaz\auth\PasswordRequest;
use App\Http\Requests\ingaz\auth\UpdateProfileRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\FirebaseToken;
use App\Models\User;
use App\Models\ingaz\UserFirebaseToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Symfony\Component\String\ByteString;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    public $postData = ['name','register_from','password','phone_code','phone'];
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request, ObjAction $action) {
        $dataInsert = $request->only($this->postData);
        $user  = $action->storeUser($dataInsert);
        $credentials = request(['phone', 'password']);
        if (! $token = JWTAuth::attempt($credentials)) {
            return jsonSuccess( null,['error' => 'Unauthorized'],401);
        }
        return $this->respondWithToken1($token,$user);
    }

    public function update(UpdateProfileRequest $request, ObjAction $action)
    {

        $dataInsert = $request->only($this->postData);
        if (isset($dataInsert['password'])) {
           unset($dataInsert['password']);
        }
        $data = $action->updateUser(Auth::user()->id,$dataInsert);
        $token = $this->generateToken();
        $user = User::find(Auth::user()->id);
        $user->token = $token;
        $users = UserResource::make($user);
        if($data) {
            return jsonSuccess($users);
        }else {
            return response()->json([
                'code' => 422,
                'data' => null,
                'message' => 'كلمة المرور القديمة غير صحيحة',
            ], 422);
        }
    }

    protected function generateToken()
    {
        $user = auth('api')->user();
        $token = JWTAuth::fromUser($user);

        return $token;
    }

    public function update_password(PasswordRequest $request, ObjAction $action) {
        $data = $action->updatePassword($request);

        if($data) {
            return response()->json([
                'code' => 200,
                'data' => $data,
                'message' => 'تم بنجاح',
            ], 200);
        } else {
            return response()->json([
                'code' => 422,
                'data' => null,
                'message' => 'كلمة المرور القديمة غير صحيحة',
            ], 422);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'code' => 401,
                'data' => null,
                'message' => 'كلمة المرور غير صحيحة',
            ], 200);
        }
        $credentials = [
            'phone' => $request->phone,
            'password' => $request->password,
        ];

        $token = JWTAuth::attempt($credentials);
        if (!$token) {
            return jsonSuccess(null, 'كلمة المرور غير صحيحة او رقم الجوال غير صحيح', 401);
        }

        $user = JWTAuth::user();
        if (!$user->isActive()) {
            // User is not active, return an error
            return jsonSuccess(null, 'الحساب غير مفعل', 401);
        }
        if ($user->is_blocked == "blocked") {
            auth('api')->logout();
            return response(['message'=>__('frontend.your account had blocked , please sent to support')],400);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken1($token,$user)
    {
        $user->token = $token;
        $users = UserResource::make($user);
        return jsonSuccess($users, __("auth.done successfully"));
    }

    protected function respondWithToken($token)
    {
        $user = auth('api')->user();
        $user->token = $token;
        $users = UserResource::make($user);
        return jsonSuccess($users, __("auth.done successfully"));
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth('api')->user();
        $users = UserResource::make($user);
        return jsonSuccess($users);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        FirebaseToken::where("user_id",Auth::user()->id)->delete();
        auth('api')->logout();
        return jsonSuccess(null, 'Successfully logged out');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete()
    {
        $user = auth('api')->user();
        $user->delete();
        return jsonSuccess(null, 'Successfully Deleted');
    }
}
