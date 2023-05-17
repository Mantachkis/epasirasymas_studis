<?php

namespace App\Http\Controllers\Settings;

use App\Models\Ekp\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMainView()
    {
        return view('settings.applicationEdit', [
            'applications' => self::getApplications(),
            'year' => date('Y'),
            'templates' => Application::getTemplates()
        ]);
    }

    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMainViewWithParams(Request $req)
    {
        $year = $req->get('year');
        $langs = $req->get('lang');
        $template = $req->get('template');
        return view('settings.applicationEdit', [
            'applications' => self::getApplicationsSearch($year, $template, $langs),
            'year' => $year,
            'templates' => Application::getTemplates(),
            'langs' => $langs,
            'selectedTemplate' => $template
        ]);
    }

    /**
     * @return mixed
     */
    public static function getApplications()
    {
        return Application::orderBy('id', 'desc')->paginate(15);
    }

    /**
     * @param int $year
     * @param int|null $templateId
     * @param $langs
     * @return mixed
     */
    public static function getApplicationsSearch(int $year, int $templateId = null, $langs)
    {
        return Application::where('year', $year)
            ->when(!empty($templateId), function($q) use ($templateId) {
            $q->where('agreement_template', $templateId);
        })->when(!empty($langs), function($q) use($langs){
            $q->where('lang', 'like', '%'.implode(" ", $langs).'%');
        })->orderBy('id', 'desc')->paginate(15);
    }

    /**
     * @param Application $app
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getApplicationModalContent(Application $app)
    {
        return view('settings.partials.appEditModalContent', [
           'application' => $app,
           'templates' => Application::getTemplates()
        ]);
    }

    public function update(Application $app, Request $req){
        $app->name_lt = $req->get('name_lt');
        $app->name_en = $req->get('name_en');
        $app->year = $req->get('year');
        $app->lang = implode(" ", $req->get('lang'));
        $app->start_date = $req->get('start_date');
        $app->end_date = $req->get('end_date');

        $app->save();

        return redirect(route('epasirasymas.settings.applications.main'))->with('alert-success', 'Prašymo forma atnaujinta');
    }
}
