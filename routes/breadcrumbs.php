<?php

use App\Models\Ekp\Application;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
/** Homepage */
Breadcrumbs::for('epasirasymas', function($trail){
   $trail->push('Pradžia', route('home'));
});

/** Fake to show that it has a path for master admin part, but it has no visible url */

Breadcrumbs::for('magistrai', function($trail){
    $trail->parent('epasirasymas');
    $trail->push('Magistrai');
});

/** Grade entering breadcrumbs part start */

Breadcrumbs::for('epasirasymas.magistrai.balu_suvedimas', function($trail){
    $trail->parent('magistrai');
    $trail->push('Duomenų tikrinimas ir balų suvedimas', route('epasirasymas.magistrai.balu_suvedimas'));
});

Breadcrumbs::for('epasirasymas.magistrai.balu_suvedimas.metai', function($trail, $year){
    $trail->parent('magistrai');
    $trail->push('Duomenų tikrinimas ir balų suvedimas', route('epasirasymas.magistrai.balu_suvedimas.metai', $year));
});

Breadcrumbs::for('epasirasymas.magistrai.balu_suvedimas.full', function($trail, $year, $program, $stage){
    $trail->parent('magistrai');
    $trail->push('Duomenų tikrinimas ir balų suvedimas', route('epasirasymas.magistrai.balu_suvedimas.full', ['year' => $year, 'program' => $program, 'stage' => $stage]));
});
/** Grade entering breadcrumbs end */

/** Invites generation breadcrumbs start */

Breadcrumbs::for('epasirasymas.magistrai.konkursine_eile', function($trail){
    $trail->parent('magistrai');
    $trail->push('Konkursinė eilė', route('epasirasymas.magistrai.konkursine_eile'));
});

Breadcrumbs::for('epasirasymas.magistrai.konkursine_eile.metai', function($trail, $year){
    $trail->parent('magistrai');
    $trail->push('Konkursinė eilė', route('epasirasymas.magistrai.konkursine_eile.metai', $year));
});

Breadcrumbs::for('epasirasymas.magistrai.konkursine_eile.full', function($trail, $year, $program, $stage){
    $trail->parent('magistrai');
    $trail->push('Konkursinė eilė', route('epasirasymas.magistrai.konkursine_eile.full', ['year' => $year, 'program' => $program, 'stage' => $stage]));
});

/** Invites generation breadcrumbs end */

/** Settings breadcrumbs */

Breadcrumbs::for('settings', function ($trail){
   $trail->parent('epasirasymas');
   $trail->push('Nustatymai');
});
Breadcrumbs::for('settings.pedagogai', function($trail){
    $trail->parent('settings');
    $trail->push('Pedagogai');
});
Breadcrumbs::for('settings.magistrai', function($trail){
    $trail->parent('settings');
    $trail->push('Magistrai');
});

Breadcrumbs::for('epasirasymas.settings.magistrai.stage', function($trail){
   $trail->parent('settings.magistrai');
   $trail->push('Etapai', route('epasirasymas.settings.magistrai.stage'));
});
Breadcrumbs::for('epasirasymas.settings.pedagogai.stage', function($trail){
    $trail->parent('settings.pedagogai');
    $trail->push('Etapai', route('epasirasymas.settings.pedagogai.stage'));
});


Breadcrumbs::for('epasirasymas.settings.magistrai.programos', function($trail){
    $trail->parent('settings.magistrai');
    $trail->push('Programų redagavimas', route('epasirasymas.settings.magistrai.programos'));
});

Breadcrumbs::for('epasirasymas.settings.magistrai.koeficientai', function($trail){
    $trail->parent('settings.magistrai');
    $trail->push('Programų koeficientų redagavimas', route('epasirasymas.settings.magistrai.koeficientai'));
});

Breadcrumbs::for('epasirasymas.settings.applications.main', function($trail){
    $trail->parent('settings');
    $trail->push('Prašymų formų redagavimas', route('epasirasymas.settings.applications.main'));
});

Breadcrumbs::for('epasirasymas.settings.applications.applicationsSearch', function($trail){
    $trail->parent('settings');
    $trail->push('Prašymų formų redagavimas', route('epasirasymas.settings.applications.applicationsSearch'));
});

Breadcrumbs::for('epasirasymas.settings.adminTables.getTable', function($trail){
    $trail->parent('settings');
    $trail->push('Administracinių lentelių struktūros redagavimas', route('epasirasymas.settings.adminTables.getTable'));
});

Breadcrumbs::for('epasirasymas.settings.surnameChange.surnMain', function($trail){
    $trail->parent('settings');
    $trail->push('Pavardžių keitimo ataskaita', route('epasirasymas.settings.surnameChange.surnMain'));
});


/** Settings breadcrumbs end */

/** Masters reports start */

Breadcrumbs::for('reports', function($trail){
    $trail->parent('epasirasymas');
    $trail->push('Ataskaitos');
});

Breadcrumbs::for('epasirasymas.reports.applicantsBase', function($trail){
    $trail->parent('reports');
    $trail->push('Kandidatų ataskaita', route('epasirasymas.reports.applicantsBase'));
});

Breadcrumbs::for('epasirasymas.reports.ordersReport', function($trail){
    $trail->parent('reports');
    $trail->push('Priėmimo įsakymai', route('epasirasymas.reports.ordersReport'));
});

Breadcrumbs::for('epasirasymas.reports.programReportBase', function($trail){
    $trail->parent('reports');
    $trail->push('Programų ataskaita', route('epasirasymas.reports.programReportBase'));
});

Breadcrumbs::for('epasirasymas.reports.programReportFull', function($trail, $year, $program, $type, $stage){
    $trail->parent('reports');
    $trail->push('Programų ataskaita', route('epasirasymas.reports.programReportFull', ['year' => $year, 'program' => $program, 'type' => $type, 'stage' => $stage]));
});
Breadcrumbs::for('epasirasymas.reports.statisticsReportBase', function($trail){
    $trail->parent('reports');
    $trail->push('Programų ataskaita', route('epasirasymas.reports.statisticsReportBase'));
});
Breadcrumbs::for('epasirasymas.reports.statisticsReportFull', function($trail,$year, $faculty, $stage){
    $trail->parent('reports');
    $trail->push('Programų ataskaita', route('epasirasymas.reports.statisticsReportFull',['year' => $year, 'faculty' => $faculty,  'stage' => $stage]));
});

/** Masters reports end */

/** Foreigner entry */

Breadcrumbs::for('foreignerDataEntry', function($trail){
    $trail->parent('epasirasymas');
    $trail->push('Atvykstančiųjų įvedimas');
});

Breadcrumbs::for('epasirasymas.foreignerDataEntry.create', function($trail){
    $trail->parent('foreignerDataEntry');
    $trail->push('Kūrimas');
});

Breadcrumbs::for('epasirasymas.foreignerDataEntry.index', function($trail){
    $trail->parent('foreignerDataEntry');
    $trail->push('Peržiūra');
});

/** Foreigner entry end */

/** Submitted applications start */

Breadcrumbs::for('submittedApplications', function($trail){
    $trail->parent('epasirasymas');
    $trail->push('Pateikti prašymai');
 });

 Breadcrumbs::for('epasirasymas.submittedApplications', function($trail, $id){
    $trail->parent('submittedApplications');
    $trail->push(Application::getApplicationName($id), route('epasirasymas.submittedApplications', ['id' => $id]));
 });

 /** Submitted applications end */
