<?php

namespace App\Http\Controllers;

use App\Models\kuesioner\Competency;
use App\Models\kuesioner\Work;
use App\Models\kuesioner\Kuesioner_Tracer_Study;
use App\Models\kuesioner\Study;
use App\Models\kuesioner\Work_Compatibility;
use App\Models\kuesioner\Work_Hunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KuesionerController extends Controller
{
    public function ShowKuesioner()
    {
        return view('tracer_study.kuesioner');
    }

    public function kuesioner_form(Request $request)
    {

        $success = false;

        $user = User::findOrFail(Auth::user()->id);
        $form_value = $request->post();

        $alumni_status = $form_value['p_alumni_status'];

        //Begin db transaction for questionare answers
        DB::beginTransaction();

        //Table Kuesioner
        DB::table('kuesioner')->insert([
            'alumni_id' => $user->alumni->id,
            'alumni_status' => $form_value['p_alumni_status'],
            'university_payment_source' => $form_value['p_university_payment_source'] == "7" ? $form_value['p_university_payment_source_remarks']: $form_value['p_university_payment_source'],
            'lecture_method' => $form_value['p_lecture_method'],
            'demo_method' => $form_value['p_demo_method'],
            'project_method' => $form_value['p_project_method'],
            'internship_method' => $form_value['p_internship_method'],
            'practical_method' => $form_value['p_practical_method'],
            'field_method' => $form_value['p_field_method'],
            'discussion_method' => $form_value['p_discussion_method'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $last_kuesioner_id = DB::getPdo()->lastInsertId();

        if ($alumni_status == 1 || $alumni_status == 2) {
            //Table Kuesioner Work
            DB::table('kuesioner_work')->insert([
                'tracer_study_id' => $last_kuesioner_id,
                'job_position' => $alumni_status == 2 ? $form_value['p_job_position'] : null,
                'job_before_status' => $form_value['p_job_before_status'],
                'job_acquired_time' => $form_value['p_job_acquired_time'],
                'company' => $form_value['p_company'],
                'salary' => $form_value['p_salary'],
                'company_province' => $form_value['p_company_province'],
                'company_regency' => $form_value['p_company_regency'],
                'company_type' => $form_value['p_company_type'] != '5' ? $form_value['p_company_type'] : $form_value['p_company_type_other'],
                'company_level' => $form_value['p_company_level'],
                "university_company_relation"=> $form_value['p_university_company_relation'],
                "university_company_level"=> $form_value['p_university_company_level'],
                'applied_company' => $form_value['p_applied_company'],
                'applied_company_responded' => $form_value['p_applied_company_responded'],
                'applied_company_interviewed' => $form_value['p_applied_company_interview'],
                'job_hunting_status' => $form_value['p_job_hunting_status'] != 'Lainnya' ? $form_value['p_job_hunting_status'] : $form_value['p_job_hunting_remark'],
                'job_hunt_type' => $form_value['p_job_hunt_type'],
                'job_hunt_month' => $form_value['p_job_hunt_type'] == 'Sebelum Lulus' ? $form_value['p_job_hunt_month'][0] : ($form_value['p_job_hunt_type'] == 'Setelah Lulus' ? $form_value['p_job_hunt_month'][1] : null),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $last_kuesioner_work_id = DB::getPdo()->lastInsertId();

            //Table Kuesioner Competency
            DB::table('kuesioner_competency')->insert([
                [
                    'kuesioner_work_id' => $last_kuesioner_work_id,
                    'type' => 'graduation',
                    'ethics' => $form_value['p_ethics_graduation'],
                    'expertise' => $form_value['p_expertise_graduation'],
                    'english' => $form_value['p_english_graduation'],
                    'tech' => $form_value['p_tech_graduation'],
                    'communication' => $form_value['p_communication_graduation'],
                    'teamwork' => $form_value['p_teamwork_graduation'],
                    'development' => $form_value['p_development_graduation'],
                    'created_at' => now(),
                    'updated_at' => now()
                ], [
                    'kuesioner_work_id' => $last_kuesioner_work_id,
                    'type' => 'work',
                    'ethics' => $form_value['p_ethics_work'],
                    'expertise' => $form_value['p_expertise_work'],
                    'english' => $form_value['p_english_work'],
                    'tech' => $form_value['p_tech_work'],
                    'communication' => $form_value['p_communication_work'],
                    'teamwork' => $form_value['p_teamwork_work'],
                    'development' => $form_value['p_development_work'],
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

            //Table Kuesioner Job Hunting
            $job_hunt_methods = [];
            foreach ($form_value['p_job_hunt_method'] as $key => $value) {
                if ($key == 14) {
                    array_push($job_hunt_methods, [
                        'kuesioner_work_id' => $last_kuesioner_work_id,
                        'job_hunt_method' => $value,
                        'remarks' => $form_value['p_job_hunt_method_other'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                    continue;
                }

                array_push($job_hunt_methods, [
                    'kuesioner_work_id' => $last_kuesioner_work_id,
                    'job_hunt_method' => $value,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::table('kuesioner_work_hunt')->insert($job_hunt_methods);

            //Table Kuesioner Job Compatibility
            $job_compatibility = [];
            foreach ($form_value['p_compatibility_type'] as $key => $value) {
                if ($key == 12) {
                    array_push($job_compatibility, [
                        'kuesioner_work_id' => $last_kuesioner_work_id,
                        'compatibility_type' => $value,
                        'compatibility' => $form_value['p_compatibility_remark'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                    continue;
                }

                array_push($job_compatibility, [
                    'kuesioner_work_id' => $last_kuesioner_work_id,
                    'compatibility_type' => $value,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::table('kuesioner_work_compatibility')->insert($job_compatibility);
        }

        if ($alumni_status == 3) {
            //Table Kuesioner Edukasi Lanjut
            DB::table('kuesioner_education')->insert([
                'tracer_study_id' => $last_kuesioner_id,
                'location' => $form_value['p_location'] == 'Dalam Negeri' ? $form_value['p_location'] : $form_value['p_location_remark'],
                'payment_type' => $form_value['p_payment_type'] == 'Biaya Sendiri' ? $form_value['p_payment_type'] : $form_value['p_payment_type_remark'],
                'start_date' => $form_value['p_start_date'],
                'university_name' => $form_value['p_university_name'],
                'major' => $form_value['p_major'],
                'reasons' => $form_value['p_reasons'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        if (DB::transactionLevel() == 1) {
            DB::commit();
            response()->json(['response' => 'success', 'message' => 'Success! Data has been added.'], 200);
            return redirect()->route('home')->withSuccess('Success! Data has been added.');
        } else {
            DB::rollback();
            // something went wrong
            response()->json(['response' => 'error', 'message' => 'Error! Something went wrong.'], 500);
            return redirect()->back()->withInput($form_value);
        }
    }

    public function charts_ti()
    {
        $prodi = 'Teknik Informatika';
        return $this->kuesioner_data($prodi);
    }

    public function charts_tmj()
    {
        $prodi = 'Teknik Multimedia dan Jaringan';
        return $this->kuesioner_data($prodi);
    }

    public function charts_tmd()
    {
        $prodi = 'Teknik Multimedia Digital';
        return $this->kuesioner_data($prodi);
    }

    public function charts_tkj()
    {
        $prodi = 'Teknik Komputer dan Jaringan';
        return $this->kuesioner_data($prodi);
    }

    public function methodology_score($prodi)
    {
        $method = [
            'LECTURE_METHOD',
            'DEMO_METHOD',
            'PROJECT_METHOD',
            'INTERNSHIP_METHOD',
            'PRACTICAL_METHOD',
            'FIELD_METHOD',
            'DISCUSSION_METHOD',
        ];

        $method_data = [];

        foreach ($method as $key => $value) {
            $method_data[$value] = Kuesioner_Tracer_Study::countEveryMethod($prodi, $value);
        }

        return $method_data;
    }

    public function competency_score($prodi)
    {
        $types = ['work', 'graduation'];

        $categories = [
            "ETHICS",
            "EXPERTISE",
            "ENGLISH",
            "TECH",
            "COMMUNICATION",
            "TEAMWORK",
            "DEVELOPMENT",
        ];

        $competency_data = [];

        foreach ($types as $name => $type) {
            foreach ($categories as $key => $category) {
                $competency_data[$type][$category] = Competency::countCompetency($prodi, $type, $category);
            }
        }

        return $competency_data;
    }

    public function kuesioner_data($prodi)
    {
        $workStatus = Work::countWorkStatus($prodi);
        $averageMethod = Kuesioner_Tracer_Study::countAverageMethod($prodi);
        $jobPosition = Work::countJobPosition($prodi);
        $method_data = $this->methodology_score($prodi);
        $competency_data = $this->competency_score($prodi);

        $type = [
            "Instansi Pemerintah",
            "BUMN/BUMD",
            "Institusi/Organisasi Multilateral",
            "Organisasi non-profit/Lembaga Swadaya Masyarakat",
            "Perusahaan swasta",
            "Wiraswasta/perusahaan sendiri",
            "5",
        ];

        $company_type = Work::countCompany($prodi, 'COMPANY_TYPE', $type);

        $type = [
            "Lokal/wilayah/wiraswasta tidak berbadan hukum",
            "Nasional/wiraswasta berbadan hukum",
            "Multinasional/internasional"
        ];

        $company_level = Work::countCompany($prodi, 'COMPANY_LEVEL', $type);

        $education_location = Study::countFurtherEducation($prodi, 'LOCATION', [
            "Dalam Negeri",
            "Luar Negeri",
        ]);

        $education_payment = Study::countFurtherEducation($prodi, 'PAYMENT_TYPE', [
            "Biaya Sendiri",
            "Beasiswa",
        ]);

        $education_reason = Study::countFurtherEducation($prodi, 'REASONS', [
            "Tuntutan profesi",
            "Kesempatan beasiswa",
            "Prestise",
            "Belum ada keinginan untuk bekerja",
        ]);

        $work_compatibility = Work_Compatibility::countCompatibility($prodi);

        $work_hunt = Work_Hunt::countWorkHunt($prodi);

        return view('tracer_study.chart', [
            'workStatus' => $workStatus,
            'averageMethod' => $averageMethod,
            'lectureScore' => $method_data['LECTURE_METHOD'],
            'demoScore' => $method_data['DEMO_METHOD'],
            'projectScore' => $method_data['PROJECT_METHOD'],
            'internScore' => $method_data['INTERNSHIP_METHOD'],
            'praticalScore' => $method_data['PRACTICAL_METHOD'],
            'fieldScore' => $method_data['FIELD_METHOD'],
            'discussionScore' => $method_data['DISCUSSION_METHOD'],
            'jobPosition' => $jobPosition,
            'company_type' => $company_type,
            'company_level' => $company_level,
            'education_location' => $education_location,
            'education_payment' => $education_payment,
            'education_reason' => $education_reason,
            'work_compatibility' => $work_compatibility,
            'work_hunt' => $work_hunt,
            'competency_data' => $competency_data,
        ]);
    }
}
