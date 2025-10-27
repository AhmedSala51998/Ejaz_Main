<?php

namespace App\Http\Actions\ingaz;

use App\Http\Actions\MainAction;
use App\Models\Biography as Maid;
use Illuminate\Support\Facades\DB;

class MaidAction extends MainAction
{
    public function __construct(Maid $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Maid/';
    }

    public function storeMaid($data, $request)
    {
        if ($data['cv_file']) {
            $image = $data['cv_file'];
            $data['cv_file'] = uploadFile($image, $this->fileFolder);
        }
        if (isset($data['image'])) {
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder);
        }
        if (isset($data['cv_preview'])) {
            $image = $data['cv_preview'];
            $data['cv_preview'] = uploadFile($image, $this->fileFolder);
        }
        $maid = parent::store($data);
        $maid->jobTitles()->attach($request->job_id);
        $maid->jobTypes()->attach($request->type_id);
        return $maid;
    }

    public function getMaids($request)
    {
        // dd($request->all());
        $type = $request->type??'admission';
        return $this->model->where('status', 'new')
        ->where('order_type', 'normal')
        ->where('is_cv_out',0)
       // ->where('type',$type)
        ->with('recruitment_office', 'nationalitie', 'language_title',
            'religion', 'job', 'social_type', 'admin', 'images', 'skills')
        ->when($request->nationality_id && $request->nationality_id != null, function ($q) use ($request) {
            return $q->where('nationalitie_id', $request->nationality_id);
        })
            ->when($request->religion_id && $request->religion_id != null, function ($q) use ($request) {
                return $q->where('religion_id', $request->religion_id);
            })
            ->when($request->job_id && $request->job_id != null, function ($q) use ($request) {
                return $q->where('job_id', $request->job_id);
            })
            // ->when($request->job_type_id && $request->job_type_id != null, function ($q) use ($request) {
            //     $q->whereHas('jobTypes', function ($subQ) use ($request) {
            //         if ($request->job_type_id[0] != null && is_array($request->job_type_id)) {
            //             $subQ->whereIn('job_type_id', $request->job_type_id);
            //         }
            //     });
            // })
            // ->when($request->filled('job_title_id') && !empty(array_filter($request->job_title_id)), function ($q) use ($request) {
            //     $q->whereHas('jobTitles', function ($subQ) use ($request) {
            //         if (is_array($request->job_title_id)) {
            //             $subQ->whereIn('job_title_id', $request->job_title_id);
            //         } else {
            //             $subQ->where('job_title_id', $request->job_title_id);
            //         }
            //     });
            // })
//                return $this->model;
            ->when($request->age_from && $request->age_to, function ($q) use ($request) {
                // return $q->whereBetween('age', [$request->age_from, $request->age_to]);
                return $q->where('age', '>=', $request->age_from)->where('age', '<=', $request->age_to);
            });
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getMaidsSearch($request)
    {
        $keyword = $request->search;

        $results = Maid::select('maids.*')
            ->leftJoin('nationalities_translations', 'maids.nationality_id', '=', 'nationalities_translations.nationality_id')
            ->leftJoin('religions_translations', 'maids.religion_id', '=', 'religions_translations.religion_id')
            ->where(function ($query) use ($keyword) {
                $query->where('nationalities_translations.title', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('jobTypes', function ($subQ) use ($keyword) {
                        $subQ->whereTranslationLike('title', '%' . $keyword . '%');
                    })
                    ->orWhereHas('jobTitles', function ($subQ) use ($keyword) {
                        $subQ->whereTranslationLike('title', '%' . $keyword . '%');
                    })
                    ->orWhere('religions_translations.title', 'LIKE', '%' . $keyword . '%');
            })->distinct();
        return $results;
    }

    public function updateMaid($id, $data, $request)
    {
        $maid = parent::find($id);

        if (isset($data['cv_file'])) {
            deleteFile($maid->cv_file);
            $image = $data['cv_file'];
            $data['cv_file'] = uploadFile($image, $this->fileFolder);
        }
        if (isset($data['cv_preview'])) {
            deleteFile($maid->cv_preview);
            $image = $data['cv_preview'];
            $data['cv_preview'] = uploadFile($image, $this->fileFolder);
        }
        if (isset($data['image'])) {
            deleteFile($maid->image);
            $image = $data['image'];
            $data['image'] = uploadFile($image, $this->fileFolder);
        }
        $row = parent::find($id);
        $row->update($data);
//        parent::update($id, $data);
        if ($request->job_id) {
            $maid->jobTitles()->sync($request->job_id);
        }
        if ($request->type_id) {
            $maid->jobTypes()->sync($request->type_id);
        }
        return parent::find($id);
    }
}
