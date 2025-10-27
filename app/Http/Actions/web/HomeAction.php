<?php

namespace App\Http\Actions\web;

use App\Enums\OrderStatus;
use App\Enums\UserType;
use App\Http\Actions\ingaz\JobTitleAction;
use App\Http\Actions\ingaz\StatisticAction;
use App\Http\Actions\ingaz\StepAction;
use App\Http\Actions\khedmaty\AboutUsAction;
use App\Http\Actions\khedmaty\SliderAction;
use App\Models\ingaz\AboutUs;
use App\Models\ingaz\JobTitle;
use App\Models\ingaz\Nationality;
use App\Models\ingaz\JobType;
use App\Models\ingaz\Service;
use App\Models\khedmaty\Blog;
use App\Models\khedmaty\Car;
use App\Http\Actions\MainAction;
use App\Models\khedmaty\Category;
use App\Models\khedmaty\Department;
use App\Models\khedmaty\Feature;
use App\Models\khedmaty\LatestNews;
use App\Models\khedmaty\Order;
use App\Models\khedmaty\Product;
use App\Models\khedmaty\Slider;
use App\Models\khedmaty\UserCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HomeAction extends MainAction
{
    public $stepAction;
    public $statisticAction;

    public function __construct(StepAction $stepAction,StatisticAction $statisticAction)
    {
        $this->stepAction = $stepAction;
        $this->statisticAction = $statisticAction;

    }

    public function index($appVisitAction,$request)
    {
        $request['type'] = 'web';
        $appVisitAction->storeAppVisit($request);
        $data['job_types'] = JobType::get();
        $data['job_titles'] = JobTitle::get();
        $data['nationalities'] = Nationality::get();
        $data['about_us'] = AboutUs::get();
        $data['services'] = Service::get();
        $data['steps'] = $this->stepAction->get();
        $data['statistics'] = $this->statisticAction->get();
        $data['icons'] = ['fa-sharp fa-regular fa-fire','fa-solid fa-face-thinking','fa-light fa-hand-point-up'];

        return $data;
    }

    public function updateCar($id, $data)
    {
        $this->find($id)->update( $data);
    }

    public function deleteCar($id)
    {
        $obj = $this->find($id);
        $this->delete($id);
    }

}
