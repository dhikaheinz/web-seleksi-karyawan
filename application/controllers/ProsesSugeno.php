<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProsesSugeno extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['karyawan_m', 'fuzzy_m']);
    }

    public function index()
    {
        if ($this->session->userdata('authenticated')) {
            $data['data_karyawan'] = $this->fuzzy_m->get_karyawan()->result_array();
            $this->template->load('templates/index', 'proses_fuzzy/index', $data);
        } else {
            redirect('auth');
        }
    }

    public function fuzzyfikasi()
    {
        $id_karyawan = $this->uri->segment(3);
        $usia = $this->uri->segment(4);
        $pend = $this->uri->segment(5);
        $peng = $this->uri->segment(6);
        $nt = $this->uri->segment(7);

        $derajat_nilai = 1;
        if ($derajat_nilai == 1) {
            //Derajat Keanggotaan Usia
            if ($usia <= 25 && $usia >= 20) {
                $usia_muda = (25 - $usia) / (25 - 20);
            } else if ($usia <= 20) {
                $usia_muda = 1;
            } else {
                $usia_muda = 0;
            }
            $h_um = round($usia_muda, 2);

            if ($usia <= 25 && $usia >= 20) {
                $usia_dewasa = ($usia - 20) / (25 - 20);
            } else if ($usia >= 25 && $usia <= 30) {
                $usia_dewasa = (30 - $usia) / (30 - 25);
            } else {
                $usia_dewasa = 0;
            }
            $h_ud = round($usia_dewasa, 2);

            if ($usia >= 25 && $usia <= 30) {
                $usia_tua = ($usia - 25) / (30 - 25);
            } else if ($usia >= 30) {
                $usia_tua = 1;
            } else {
                $usia_tua = 0;
            }
            $h_ut =  round($usia_tua, 2);

            //Derajat Keanggotaan Pendidikan
            if ($pend == 1) {
                $pend_smp = 1;
            } else {
                $pend_smp = 0;
            }
            $h_pend_smp = $pend_smp;

            if ($pend == 2) {
                $pend_sma = 1;
            } else {
                $pend_sma = 0;
            }
            $h_pend_sma = $pend_sma;

            if ($pend == 3) {
                $pend_diploma = 1;
            } else {
                $pend_diploma = 0;
            }
            $h_pend_diploma = $pend_diploma;

            //Derajat Keanggotaan Pengalaman
            if ($peng <= 6 && $peng >= 2) {
                $pengalaman_sedikit = (6 - $peng) / (6 - 2);
            } else if ($peng <= 2) {
                $pengalaman_sedikit = 1;
            } else {
                $pengalaman_sedikit = 0;
            }
            $h_peng_s = round($pengalaman_sedikit, 2);

            if ($peng <= 6 && $peng >= 2) {
                $pengalaman_sedang = ($peng - 2) / (6 - 2);
            } else if ($peng >= 6 && $peng <= 10) {
                $pengalaman_sedang = (10 - $peng) / (10 - 6);
            } else {
                $pengalaman_sedang = 0;
            }
            $h_peng_sg = round($pengalaman_sedang, 2);

            if ($peng >= 6 && $peng <= 10) {
                $pengalaman_banyak = ($peng - 6) / (10 - 6);
            } else if ($peng >= 10) {
                $pengalaman_banyak = 1;
            } else {
                $pengalaman_banyak = 0;
            }
            $h_peng_b = round($pengalaman_banyak, 2);

            //Derajat Keanggotaan Nilai Test
            if ($nt <= 70 && $nt >= 60) {
                $nilai_rendah = (70 - $nt) / (70 - 60);
            } else if ($nt <= 60) {
                $nilai_rendah = 1;
            } else {
                $nilai_rendah = 0;
            }
            $h_nt_r =  round($nilai_rendah, 2);

            if ($nt <= 70 && $nt >= 60) {
                $nilai_sedang = ($nt - 60) / (70 - 60);
            } else if ($nt >= 70 && $nt <= 80) {
                $nilai_sedang = (80 - $nt) / (80 - 70);
            } else {
                $nilai_sedang = 0;
            }
            $h_nt_s = round($nilai_sedang, 2);

            if ($nt >= 70 && $nt <= 80) {
                $nilai_tinggi = ($nt - 70) / (80 - 70);
            } else if ($nt >= 80) {
                $nilai_tinggi = 1;
            } else {
                $nilai_tinggi = 0;
            }
            $h_nt_t = round($nilai_tinggi, 2);
        }

        $rule_aktif = 1;
        if ($rule_aktif == 1) {
            //Rule 1
            if ($h_um > 0) {
                $r1_usia = $h_um;
            } else {
                $r1_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r1_pend = $h_pend_smp;
            } else {
                $r1_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r1_peng = $h_peng_s;
            } else {
                $r1_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r1_nilai = $h_nt_r;
            } else {
                $r1_nilai = 0;
            }

            //Rule 2
            if ($h_um > 0) {
                $r2_usia = $h_um;
            } else {
                $r2_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r2_pend = $h_pend_smp;
            } else {
                $r2_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r2_peng = $h_peng_s;
            } else {
                $r2_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r2_nilai = $h_nt_s;
            } else {
                $r2_nilai = 0;
            }

            //Rule 3
            if ($h_um > 0) {
                $r3_usia = $h_um;
            } else {
                $r3_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r3_pend = $h_pend_smp;
            } else {
                $r3_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r3_peng = $h_peng_s;
            } else {
                $r3_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r3_nilai = $h_nt_t;
            } else {
                $r3_nilai = 0;
            }

            //Rule 4
            if ($h_um > 0) {
                $r4_usia = $h_um;
            } else {
                $r4_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r4_pend = $h_pend_smp;
            } else {
                $r4_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r4_peng = $h_peng_sg;
            } else {
                $r4_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r4_nilai = $h_nt_r;
            } else {
                $r4_nilai = 0;
            }

            //Rule 5
            if ($h_um > 0) {
                $r5_usia = $h_um;
            } else {
                $r5_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r5_pend = $h_pend_smp;
            } else {
                $r5_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r5_peng = $h_peng_sg;
            } else {
                $r5_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r5_nilai = $h_nt_s;
            } else {
                $r5_nilai = 0;
            }

            //Rule 6
            if ($h_um > 0) {
                $r6_usia = $h_um;
            } else {
                $r6_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r6_pend = $h_pend_smp;
            } else {
                $r6_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r6_peng = $h_peng_sg;
            } else {
                $r6_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r6_nilai = $h_nt_t;
            } else {
                $r6_nilai = 0;
            }

            //Rule 7
            if ($h_um > 0) {
                $r7_usia = $h_um;
            } else {
                $r7_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r7_pend = $h_pend_smp;
            } else {
                $r7_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r7_peng = $h_peng_b;
            } else {
                $r7_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r7_nilai = $h_nt_r;
            } else {
                $r7_nilai = 0;
            }

            //Rule 8
            if ($h_um > 0) {
                $r8_usia = $h_um;
            } else {
                $r8_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r8_pend = $h_pend_smp;
            } else {
                $r8_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r8_peng = $h_peng_b;
            } else {
                $r8_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r8_nilai = $h_nt_s;
            } else {
                $r8_nilai = 0;
            }

            //Rule 9
            if ($h_um > 0) {
                $r9_usia = $h_um;
            } else {
                $r9_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r9_pend = $h_pend_smp;
            } else {
                $r9_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r9_peng = $h_peng_b;
            } else {
                $r9_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r9_nilai = $h_nt_t;
            } else {
                $r9_nilai = 0;
            }

            //Rule 10
            if ($h_ud > 0) {
                $r10_usia = $h_ud;
            } else {
                $r10_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r10_pend = $h_pend_smp;
            } else {
                $r10_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r10_peng = $h_peng_s;
            } else {
                $r10_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r10_nilai = $h_nt_r;
            } else {
                $r10_nilai = 0;
            }

            //Rule 11
            if ($h_ud > 0) {
                $r11_usia = $h_ud;
            } else {
                $r11_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r11_pend = $h_pend_smp;
            } else {
                $r11_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r11_peng = $h_peng_s;
            } else {
                $r11_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r11_nilai = $h_nt_s;
            } else {
                $r11_nilai = 0;
            }

            //Rule 12
            if ($h_ud > 0) {
                $r12_usia = $h_ud;
            } else {
                $r12_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r12_pend = $h_pend_smp;
            } else {
                $r12_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r12_peng = $h_peng_s;
            } else {
                $r12_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r12_nilai = $h_nt_t;
            } else {
                $r12_nilai = 0;
            }

            //Rule 13
            if ($h_ud > 0) {
                $r13_usia = $h_ud;
            } else {
                $r13_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r13_pend = $h_pend_smp;
            } else {
                $r13_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r13_peng = $h_peng_sg;
            } else {
                $r13_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r13_nilai = $h_nt_r;
            } else {
                $r13_nilai = 0;
            }

            //Rule 14
            if ($h_ud > 0) {
                $r14_usia = $h_ud;
            } else {
                $r14_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r14_pend = $h_pend_smp;
            } else {
                $r14_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r14_peng = $h_peng_sg;
            } else {
                $r14_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r14_nilai = $h_nt_s;
            } else {
                $r14_nilai = 0;
            }

            //Rule 15
            if ($h_ud > 0) {
                $r15_usia = $h_ud;
            } else {
                $r15_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r15_pend = $h_pend_smp;
            } else {
                $r15_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r15_peng = $h_peng_sg;
            } else {
                $r15_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r15_nilai = $h_nt_t;
            } else {
                $r15_nilai = 0;
            }

            //Rule 16
            if ($h_ud > 0) {
                $r16_usia = $h_ud;
            } else {
                $r16_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r16_pend = $h_pend_smp;
            } else {
                $r16_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r16_peng = $h_peng_b;
            } else {
                $r16_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r16_nilai = $h_nt_r;
            } else {
                $r16_nilai = 0;
            }

            //Rule 17
            if ($h_ud > 0) {
                $r17_usia = $h_ud;
            } else {
                $r17_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r17_pend = $h_pend_smp;
            } else {
                $r17_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r17_peng = $h_peng_b;
            } else {
                $r17_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r17_nilai = $h_nt_s;
            } else {
                $r17_nilai = 0;
            }

            //Rule 18
            if ($h_ud > 0) {
                $r18_usia = $h_ud;
            } else {
                $r18_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r18_pend = $h_pend_smp;
            } else {
                $r18_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r18_peng = $h_peng_b;
            } else {
                $r18_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r18_nilai = $h_nt_t;
            } else {
                $r18_nilai = 0;
            }

            //Rule 19
            if ($h_ut > 0) {
                $r19_usia = $h_ut;
            } else {
                $r19_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r19_pend = $h_pend_smp;
            } else {
                $r19_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r19_peng = $h_peng_s;
            } else {
                $r19_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r19_nilai = $h_nt_r;
            } else {
                $r19_nilai = 0;
            }

            //Rule 20
            if ($h_ut > 0) {
                $r20_usia = $h_ut;
            } else {
                $r20_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r20_pend = $h_pend_smp;
            } else {
                $r20_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r20_peng = $h_peng_s;
            } else {
                $r20_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r20_nilai = $h_nt_s;
            } else {
                $r20_nilai = 0;
            }

            //Rule 21
            if ($h_ut > 0) {
                $r21_usia = $h_ut;
            } else {
                $r21_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r21_pend = $h_pend_smp;
            } else {
                $r21_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r21_peng = $h_peng_s;
            } else {
                $r21_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r21_nilai = $h_nt_t;
            } else {
                $r21_nilai = 0;
            }

            //Rule 22
            if ($h_ut > 0) {
                $r22_usia = $h_ut;
            } else {
                $r22_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r22_pend = $h_pend_smp;
            } else {
                $r22_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r22_peng = $h_peng_sg;
            } else {
                $r22_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r22_nilai = $h_nt_r;
            } else {
                $r22_nilai = 0;
            }

            //Rule 23
            if ($h_ut > 0) {
                $r23_usia = $h_ut;
            } else {
                $r23_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r23_pend = $h_pend_smp;
            } else {
                $r23_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r23_peng = $h_peng_sg;
            } else {
                $r23_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r23_nilai = $h_nt_s;
            } else {
                $r23_nilai = 0;
            }

            //Rule 24
            if ($h_ut > 0) {
                $r24_usia = $h_ut;
            } else {
                $r24_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r24_pend = $h_pend_smp;
            } else {
                $r24_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r24_peng = $h_peng_sg;
            } else {
                $r24_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r24_nilai = $h_nt_t;
            } else {
                $r24_nilai = 0;
            }

            //Rule 25
            if ($h_ut > 0) {
                $r25_usia = $h_ut;
            } else {
                $r25_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r25_pend = $h_pend_smp;
            } else {
                $r25_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r25_peng = $h_peng_b;
            } else {
                $r25_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r25_nilai = $h_nt_r;
            } else {
                $r25_nilai = 0;
            }

            //Rule 26
            if ($h_ut > 0) {
                $r26_usia = $h_ut;
            } else {
                $r26_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r26_pend = $h_pend_smp;
            } else {
                $r26_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r26_peng = $h_peng_b;
            } else {
                $r26_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r26_nilai = $h_nt_s;
            } else {
                $r26_nilai = 0;
            }

            //Rule 27
            if ($h_ut > 0) {
                $r27_usia = $h_ut;
            } else {
                $r27_usia = 0;
            }
            if ($h_pend_smp > 0) {
                $r27_pend = $h_pend_smp;
            } else {
                $r27_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r27_peng = $h_peng_b;
            } else {
                $r27_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r27_nilai = $h_nt_t;
            } else {
                $r27_nilai = 0;
            }

            #============================#

            //Rule 28
            if ($h_um > 0) {
                $r28_usia = $h_um;
            } else {
                $r28_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r28_pend = $h_pend_sma;
            } else {
                $r28_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r28_peng = $h_peng_s;
            } else {
                $r28_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r28_nilai = $h_nt_r;
            } else {
                $r28_nilai = 0;
            }

            //Rule 29
            if ($h_um > 0) {
                $r29_usia = $h_um;
            } else {
                $r29_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r29_pend = $h_pend_sma;
            } else {
                $r29_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r29_peng = $h_peng_s;
            } else {
                $r29_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r29_nilai = $h_nt_s;
            } else {
                $r29_nilai = 0;
            }

            //Rule 30
            if ($h_um > 0) {
                $r30_usia = $h_um;
            } else {
                $r30_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r30_pend = $h_pend_sma;
            } else {
                $r30_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r30_peng = $h_peng_s;
            } else {
                $r30_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r30_nilai = $h_nt_t;
            } else {
                $r30_nilai = 0;
            }

            //Rule 31
            if ($h_um > 0) {
                $r31_usia = $h_um;
            } else {
                $r31_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r31_pend = $h_pend_sma;
            } else {
                $r31_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r31_peng = $h_peng_sg;
            } else {
                $r31_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r31_nilai = $h_nt_r;
            } else {
                $r31_nilai = 0;
            }

            //Rule 32
            if ($h_um > 0) {
                $r32_usia = $h_um;
            } else {
                $r32_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r32_pend = $h_pend_sma;
            } else {
                $r32_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r32_peng = $h_peng_sg;
            } else {
                $r32_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r32_nilai = $h_nt_s;
            } else {
                $r32_nilai = 0;
            }

            //Rule 33
            if ($h_um > 0) {
                $r33_usia = $h_um;
            } else {
                $r33_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r33_pend = $h_pend_sma;
            } else {
                $r33_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r33_peng = $h_peng_sg;
            } else {
                $r33_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r33_nilai = $h_nt_t;
            } else {
                $r34_nilai = 0;
            }

            //Rule 34
            if ($h_um > 0) {
                $r34_usia = $h_um;
            } else {
                $r34_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r34_pend = $h_pend_sma;
            } else {
                $r34_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r34_peng = $h_peng_b;
            } else {
                $r34_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r34_nilai = $h_nt_r;
            } else {
                $r34_nilai = 0;
            }

            //Rule 35
            if ($h_um > 0) {
                $r35_usia = $h_um;
            } else {
                $r35_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r35_pend = $h_pend_sma;
            } else {
                $r35_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r35_peng = $h_peng_b;
            } else {
                $r35_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r35_nilai = $h_nt_s;
            } else {
                $r35_nilai = 0;
            }

            //Rule 36
            if ($h_um > 0) {
                $r36_usia = $h_um;
            } else {
                $r36_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r36_pend = $h_pend_sma;
            } else {
                $r36_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r36_peng = $h_peng_b;
            } else {
                $r36_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r36_nilai = $h_nt_t;
            } else {
                $r36_nilai = 0;
            }

            //Rule 37
            if ($h_ud > 0) {
                $r37_usia = $h_ud;
            } else {
                $r37_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r37_pend = $h_pend_sma;
            } else {
                $r37_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r37_peng = $h_peng_s;
            } else {
                $r37_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r37_nilai = $h_nt_r;
            } else {
                $r37_nilai = 0;
            }

            //Rule 38
            if ($h_ud > 0) {
                $r38_usia = $h_ud;
            } else {
                $r38_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r38_pend = $h_pend_sma;
            } else {
                $r38_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r38_peng = $h_peng_s;
            } else {
                $r38_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r38_nilai = $h_nt_r;
            } else {
                $r38_nilai = 0;
            }

            //Rule 39
            if ($h_ud > 0) {
                $r39_usia = $h_ud;
            } else {
                $r39_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r39_pend = $h_pend_sma;
            } else {
                $r39_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r39_peng = $h_peng_s;
            } else {
                $r39_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r39_nilai = $h_nt_t;
            } else {
                $r39_nilai = 0;
            }

            //Rule 40
            if ($h_ud > 0) {
                $r40_usia = $h_ud;
            } else {
                $r40_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r40_pend = $h_pend_sma;
            } else {
                $r40_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r40_peng = $h_peng_sg;
            } else {
                $r40_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r40_nilai = $h_nt_r;
            } else {
                $r40_nilai = 0;
            }

            //Rule 41
            if ($h_ud > 0) {
                $r41_usia = $h_ud;
            } else {
                $r41_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r41_pend = $h_pend_sma;
            } else {
                $r41_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r41_peng = $h_peng_sg;
            } else {
                $r41_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r41_nilai = $h_nt_s;
            } else {
                $r41_nilai = 0;
            }

            //Rule 42
            if ($h_ud > 0) {
                $r42_usia = $h_ud;
            } else {
                $r42_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r42_pend = $h_pend_sma;
            } else {
                $r42_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r42_peng = $h_peng_sg;
            } else {
                $r42_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r42_nilai = $h_nt_t;
            } else {
                $r42_nilai = 0;
            }

            //Rule 43
            if ($h_ud > 0) {
                $r43_usia = $h_ud;
            } else {
                $r43_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r43_pend = $h_pend_sma;
            } else {
                $r43_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r43_peng = $h_peng_b;
            } else {
                $r43_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r43_nilai = $h_nt_r;
            } else {
                $r43_nilai = 0;
            }

            //Rule 44
            if ($h_ud > 0) {
                $r44_usia = $h_ud;
            } else {
                $r44_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r44_pend = $h_pend_sma;
            } else {
                $r44_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r44_peng = $h_peng_b;
            } else {
                $r44_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r44_nilai = $h_nt_s;
            } else {
                $r44_nilai = 0;
            }

            //Rule 45
            if ($h_ud > 0) {
                $r45_usia = $h_ud;
            } else {
                $r45_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r45_pend = $h_pend_sma;
            } else {
                $r45_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r45_peng = $h_peng_b;
            } else {
                $r45_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r45_nilai = $h_nt_t;
            } else {
                $r45_nilai = 0;
            }

            //Rule 46
            if ($h_ut > 0) {
                $r46_usia = $h_ut;
            } else {
                $r46_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r46_pend = $h_pend_sma;
            } else {
                $r46_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r46_peng = $h_peng_s;
            } else {
                $r46_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r46_nilai = $h_nt_r;
            } else {
                $r46_nilai = 0;
            }

            //Rule 47
            if ($h_ut > 0) {
                $r47_usia = $h_ut;
            } else {
                $r47_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r47_pend = $h_pend_sma;
            } else {
                $r47_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r47_peng = $h_peng_s;
            } else {
                $r47_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r47_nilai = $h_nt_s;
            } else {
                $r47_nilai = 0;
            }

            //Rule 48
            if ($h_ut > 0) {
                $r48_usia = $h_ut;
            } else {
                $r48_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r48_pend = $h_pend_sma;
            } else {
                $r48_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r48_peng = $h_peng_s;
            } else {
                $r48_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r48_nilai = $h_nt_t;
            } else {
                $r48_nilai = 0;
            }

            //Rule 49
            if ($h_ut > 0) {
                $r49_usia = $h_ut;
            } else {
                $r49_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r49_pend = $h_pend_sma;
            } else {
                $r49_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r49_peng = $h_peng_sg;
            } else {
                $r49_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r49_nilai = $h_nt_r;
            } else {
                $r49_nilai = 0;
            }

            //Rule 50
            if ($h_ut > 0) {
                $r50_usia = $h_ut;
            } else {
                $r50_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r50_pend = $h_pend_sma;
            } else {
                $r50_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r50_peng = $h_peng_sg;
            } else {
                $r50_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r50_nilai = $h_nt_s;
            } else {
                $r50_nilai = 0;
            }

            //Rule 51
            if ($h_ut > 0) {
                $r51_usia = $h_ut;
            } else {
                $r51_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r51_pend = $h_pend_sma;
            } else {
                $r51_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r51_peng = $h_peng_sg;
            } else {
                $r51_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r51_nilai = $h_nt_t;
            } else {
                $r51_nilai = 0;
            }

            //Rule 52
            if ($h_ut > 0) {
                $r52_usia = $h_ut;
            } else {
                $r52_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r52_pend = $h_pend_sma;
            } else {
                $r52_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r52_peng = $h_peng_b;
            } else {
                $r52_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r52_nilai = $h_nt_r;
            } else {
                $r52_nilai = 0;
            }

            //Rule 53
            if ($h_ut > 0) {
                $r53_usia = $h_ut;
            } else {
                $r53_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r53_pend = $h_pend_sma;
            } else {
                $r53_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r53_peng = $h_peng_b;
            } else {
                $r53_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r53_nilai = $h_nt_s;
            } else {
                $r53_nilai = 0;
            }

            //Rule 54
            if ($h_ut > 0) {
                $r54_usia = $h_ut;
            } else {
                $r54_usia = 0;
            }
            if ($h_pend_sma > 0) {
                $r54_pend = $h_pend_sma;
            } else {
                $r54_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r54_peng = $h_peng_b;
            } else {
                $r54_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r54_nilai = $h_nt_t;
            } else {
                $r54_nilai = 0;
            }

            #=============================================#

            //Rule 55
            if ($h_um > 0) {
                $r55_usia = $h_um;
            } else {
                $r55_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r55_pend = $h_pend_diploma;
            } else {
                $r55_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r55_peng = $h_peng_s;
            } else {
                $r55_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r55_nilai = $h_nt_r;
            } else {
                $r55_nilai = 0;
            }

            //Rule 56
            if ($h_um > 0) {
                $r56_usia = $h_um;
            } else {
                $r56_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r56_pend = $h_pend_diploma;
            } else {
                $r56_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r56_peng = $h_peng_s;
            } else {
                $r56_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r56_nilai = $h_nt_s;
            } else {
                $r56_nilai = 0;
            }

            //Rule 57
            if ($h_um > 0) {
                $r57_usia = $h_um;
            } else {
                $r57_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r57_pend = $h_pend_diploma;
            } else {
                $r57_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r57_peng = $h_peng_s;
            } else {
                $r57_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r57_nilai = $h_nt_t;
            } else {
                $r57_nilai = 0;
            }

            //Rule 58
            if ($h_um > 0) {
                $r58_usia = $h_um;
            } else {
                $r58_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r58_pend = $h_pend_diploma;
            } else {
                $r58_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r58_peng = $h_peng_sg;
            } else {
                $r58_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r58_nilai = $h_nt_r;
            } else {
                $r58_nilai = 0;
            }

            //Rule 59
            if ($h_um > 0) {
                $r59_usia = $h_um;
            } else {
                $r59_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r59_pend = $h_pend_diploma;
            } else {
                $r59_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r59_peng = $h_peng_sg;
            } else {
                $r59_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r59_nilai = $h_nt_s;
            } else {
                $r59_nilai = 0;
            }

            //Rule 60
            if ($h_um > 0) {
                $r60_usia = $h_um;
            } else {
                $r60_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r60_pend = $h_pend_diploma;
            } else {
                $r60_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r60_peng = $h_peng_sg;
            } else {
                $r60_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r60_nilai = $h_nt_t;
            } else {
                $r60_nilai = 0;
            }

            //Rule 61
            if ($h_um > 0) {
                $r61_usia = $h_um;
            } else {
                $r61_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r61_pend = $h_pend_diploma;
            } else {
                $r61_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r61_peng = $h_peng_b;
            } else {
                $r61_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r61_nilai = $h_nt_r;
            } else {
                $r61_nilai = 0;
            }

            //Rule 62
            if ($h_um > 0) {
                $r62_usia = $h_um;
            } else {
                $r62_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r62_pend = $h_pend_diploma;
            } else {
                $r62_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r62_peng = $h_peng_b;
            } else {
                $r62_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r62_nilai = $h_nt_s;
            } else {
                $r62_nilai = 0;
            }

            //Rule 63
            if ($h_um > 0) {
                $r63_usia = $h_um;
            } else {
                $r63_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r63_pend = $h_pend_diploma;
            } else {
                $r63_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r63_peng = $h_peng_b;
            } else {
                $r63_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r63_nilai = $h_nt_t;
            } else {
                $r63_nilai = 0;
            }

            //Rule 64
            if ($h_ud > 0) {
                $r64_usia = $h_ud;
            } else {
                $r64_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r64_pend = $h_pend_diploma;
            } else {
                $r64_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r64_peng = $h_peng_s;
            } else {
                $r64_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r64_nilai = $h_nt_r;
            } else {
                $r64_nilai = 0;
            }

            //Rule 65
            if ($h_ud > 0) {
                $r65_usia = $h_ud;
            } else {
                $r65_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r65_pend = $h_pend_diploma;
            } else {
                $r65_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r65_peng = $h_peng_s;
            } else {
                $r65_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r65_nilai = $h_nt_s;
            } else {
                $r65_nilai = 0;
            }

            //Rule 66
            if ($h_ud > 0) {
                $r66_usia = $h_ud;
            } else {
                $r66_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r66_pend = $h_pend_diploma;
            } else {
                $r66_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r66_peng = $h_peng_s;
            } else {
                $r66_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r66_nilai = $h_nt_t;
            } else {
                $r66_nilai = 0;
            }

            //Rule 67
            if ($h_ud > 0) {
                $r67_usia = $h_ud;
            } else {
                $r67_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r67_pend = $h_pend_diploma;
            } else {
                $r67_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r67_peng = $h_peng_sg;
            } else {
                $r67_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r67_nilai = $h_nt_r;
            } else {
                $r67_nilai = 0;
            }

            //Rule 68
            if ($h_ud > 0) {
                $r68_usia = $h_ud;
            } else {
                $r68_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r68_pend = $h_pend_diploma;
            } else {
                $r68_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r68_peng = $h_peng_sg;
            } else {
                $r68_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r68_nilai = $h_nt_s;
            } else {
                $r68_nilai = 0;
            }

            //Rule 69
            if ($h_ud > 0) {
                $r69_usia = $h_ud;
            } else {
                $r69_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r69_pend = $h_pend_diploma;
            } else {
                $r69_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r69_peng = $h_peng_s;
            } else {
                $r69_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r69_nilai = $h_nt_t;
            } else {
                $r69_nilai = 0;
            }

            //Rule 70
            if ($h_ud > 0) {
                $r70_usia = $h_ud;
            } else {
                $r70_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r70_pend = $h_pend_diploma;
            } else {
                $r70_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r70_peng = $h_peng_b;
            } else {
                $r70_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r70_nilai = $h_nt_r;
            } else {
                $r70_nilai = 0;
            }

            //Rule 71
            if ($h_ud > 0) {
                $r71_usia = $h_ud;
            } else {
                $r71_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r71_pend = $h_pend_diploma;
            } else {
                $r71_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r71_peng = $h_peng_b;
            } else {
                $r71_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r71_nilai = $h_nt_s;
            } else {
                $r71_nilai = 0;
            }

            //Rule 72
            if ($h_ud > 0) {
                $r72_usia = $h_ud;
            } else {
                $r72_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r72_pend = $h_pend_diploma;
            } else {
                $r72_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r72_peng = $h_peng_b;
            } else {
                $r72_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r72_nilai = $h_nt_t;
            } else {
                $r72_nilai = 0;
            }

            //Rule 73
            if ($h_ut > 0) {
                $r73_usia = $h_ut;
            } else {
                $r73_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r73_pend = $h_pend_diploma;
            } else {
                $r73_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r73_peng = $h_peng_s;
            } else {
                $r73_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r73_nilai = $h_nt_r;
            } else {
                $r73_nilai = 0;
            }

            //Rule 74
            if ($h_ut > 0) {
                $r74_usia = $h_ut;
            } else {
                $r74_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r74_pend = $h_pend_diploma;
            } else {
                $r74_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r74_peng = $h_peng_s;
            } else {
                $r74_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r74_nilai = $h_nt_s;
            } else {
                $r74_nilai = 0;
            }

            //Rule 75
            if ($h_ut > 0) {
                $r75_usia = $h_ut;
            } else {
                $r75_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r75_pend = $h_pend_diploma;
            } else {
                $r75_pend = 0;
            }
            if ($h_peng_s > 0) {
                $r75_peng = $h_peng_s;
            } else {
                $r75_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r75_nilai = $h_nt_t;
            } else {
                $r75_nilai = 0;
            }

            //Rule 76
            if ($h_ut > 0) {
                $r76_usia = $h_ut;
            } else {
                $r76_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r76_pend = $h_pend_diploma;
            } else {
                $r76_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r76_peng = $h_peng_sg;
            } else {
                $r76_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r76_nilai = $h_nt_r;
            } else {
                $r76_nilai = 0;
            }

            //Rule 77
            if ($h_ut > 0) {
                $r77_usia = $h_ut;
            } else {
                $r77_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r77_pend = $h_pend_diploma;
            } else {
                $r77_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r77_peng = $h_peng_sg;
            } else {
                $r77_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r77_nilai = $h_nt_s;
            } else {
                $r77_nilai = 0;
            }

            //Rule 78
            if ($h_ut > 0) {
                $r78_usia = $h_ut;
            } else {
                $r78_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r78_pend = $h_pend_diploma;
            } else {
                $r78_pend = 0;
            }
            if ($h_peng_sg > 0) {
                $r78_peng = $h_peng_sg;
            } else {
                $r78_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r78_nilai = $h_nt_t;
            } else {
                $r78_nilai = 0;
            }

            //Rule 79
            if ($h_ut > 0) {
                $r79_usia = $h_ut;
            } else {
                $r79_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r79_pend = $h_pend_diploma;
            } else {
                $r79_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r79_peng = $h_peng_b;
            } else {
                $r79_peng = 0;
            }
            if ($h_nt_r > 0) {
                $r79_nilai = $h_nt_r;
            } else {
                $r79_nilai = 0;
            }

            //Rule 80
            if ($h_ut > 0) {
                $r80_usia = $h_ut;
            } else {
                $r80_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r80_pend = $h_pend_diploma;
            } else {
                $r80_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r80_peng = $h_peng_b;
            } else {
                $r80_peng = 0;
            }
            if ($h_nt_s > 0) {
                $r80_nilai = $h_nt_s;
            } else {
                $r80_nilai = 0;
            }

            //Rule 81
            if ($h_ut > 0) {
                $r81_usia = $h_ut;
            } else {
                $r81_usia = 0;
            }
            if ($h_pend_diploma > 0) {
                $r81_pend = $h_pend_diploma;
            } else {
                $r81_pend = 0;
            }
            if ($h_peng_b > 0) {
                $r81_peng = $h_peng_b;
            } else {
                $r81_peng = 0;
            }
            if ($h_nt_t > 0) {
                $r81_nilai = $h_nt_t;
            } else {
                $r81_nilai = 0;
            }
        }

        $r1 = min($r1_usia, $r1_pend, $r1_peng, $r1_nilai);
        $r2 = min($r2_usia, $r2_pend, $r2_peng, $r2_nilai);
        $r3 = min($r3_usia, $r3_pend, $r3_peng, $r3_nilai);
        $r4 = min($r4_usia, $r4_pend, $r4_peng, $r4_nilai);
        $r5 = min($r5_usia, $r5_pend, $r5_peng, $r5_nilai);
        $r6 = min($r6_usia, $r6_pend, $r6_peng, $r6_nilai);
        $r7 = min($r7_usia, $r7_pend, $r7_peng, $r7_nilai);
        $r8 = min($r8_usia, $r8_pend, $r8_peng, $r8_nilai);
        $r9 = min($r9_usia, $r9_pend, $r9_peng, $r9_nilai);
        $r10 = min($r10_usia, $r10_pend, $r10_peng, $r10_nilai);

        $r11 = min($r11_usia, $r11_pend, $r11_peng, $r11_nilai);
        $r12 = min($r12_usia, $r12_pend, $r12_peng, $r12_nilai);
        $r13 = min($r13_usia, $r13_pend, $r13_peng, $r13_nilai);
        $r14 = min($r14_usia, $r14_pend, $r14_peng, $r14_nilai);
        $r15 = min($r15_usia, $r15_pend, $r15_peng, $r15_nilai);
        $r16 = min($r16_usia, $r16_pend, $r16_peng, $r16_nilai);
        $r17 = min($r17_usia, $r17_pend, $r17_peng, $r17_nilai);
        $r18 = min($r18_usia, $r18_pend, $r18_peng, $r18_nilai);
        $r19 = min($r19_usia, $r19_pend, $r19_peng, $r19_nilai);
        $r20 = min($r20_usia, $r20_pend, $r20_peng, $r20_nilai);

        $r21 = min($r21_usia, $r21_pend, $r21_peng, $r21_nilai);
        $r22 = min($r22_usia, $r22_pend, $r22_peng, $r22_nilai);
        $r23 = min($r23_usia, $r23_pend, $r23_peng, $r23_nilai);
        $r24 = min($r24_usia, $r24_pend, $r24_peng, $r24_nilai);
        $r25 = min($r25_usia, $r25_pend, $r25_peng, $r25_nilai);
        $r26 = min($r26_usia, $r26_pend, $r26_peng, $r26_nilai);
        $r27 = min($r27_usia, $r27_pend, $r27_peng, $r27_nilai);
        $r28 = min($r28_usia, $r28_pend, $r28_peng, $r28_nilai);
        $r29 = min($r29_usia, $r29_pend, $r29_peng, $r29_nilai);
        $r30 = min($r30_usia, $r30_pend, $r30_peng, $r30_nilai);

        $r31 = min($r31_usia, $r31_pend, $r31_peng, $r31_nilai);
        $r32 = min($r32_usia, $r32_pend, $r32_peng, $r32_nilai);
        $r33 = min($r33_usia, $r33_pend, $r33_peng, $r33_nilai);
        $r34 = min($r34_usia, $r34_pend, $r34_peng, $r34_nilai);
        $r35 = min($r35_usia, $r35_pend, $r35_peng, $r35_nilai);
        $r36 = min($r36_usia, $r36_pend, $r36_peng, $r36_nilai);
        $r37 = min($r37_usia, $r37_pend, $r37_peng, $r37_nilai);
        $r38 = min($r38_usia, $r38_pend, $r38_peng, $r38_nilai);
        $r39 = min($r39_usia, $r39_pend, $r39_peng, $r39_nilai);
        $r40 = min($r40_usia, $r40_pend, $r40_peng, $r40_nilai);

        $r41 = min($r41_usia, $r41_pend, $r41_peng, $r41_nilai);
        $r42 = min($r42_usia, $r42_pend, $r42_peng, $r42_nilai);
        $r43 = min($r43_usia, $r43_pend, $r43_peng, $r43_nilai);
        $r44 = min($r44_usia, $r44_pend, $r44_peng, $r44_nilai);
        $r45 = min($r45_usia, $r45_pend, $r45_peng, $r45_nilai);
        $r46 = min($r46_usia, $r46_pend, $r46_peng, $r46_nilai);
        $r47 = min($r47_usia, $r47_pend, $r47_peng, $r47_nilai);
        $r48 = min($r48_usia, $r48_pend, $r48_peng, $r48_nilai);
        $r49 = min($r49_usia, $r49_pend, $r49_peng, $r49_nilai);
        $r50 = min($r50_usia, $r50_pend, $r50_peng, $r50_nilai);

        $r51 = min($r51_usia, $r51_pend, $r51_peng, $r51_nilai);
        $r52 = min($r52_usia, $r52_pend, $r52_peng, $r52_nilai);
        $r53 = min($r53_usia, $r53_pend, $r53_peng, $r53_nilai);
        $r54 = min($r54_usia, $r54_pend, $r54_peng, $r54_nilai);
        $r55 = min($r55_usia, $r55_pend, $r55_peng, $r55_nilai);
        $r56 = min($r56_usia, $r56_pend, $r56_peng, $r56_nilai);
        $r57 = min($r57_usia, $r57_pend, $r57_peng, $r57_nilai);
        $r58 = min($r58_usia, $r58_pend, $r58_peng, $r58_nilai);
        $r59 = min($r59_usia, $r59_pend, $r59_peng, $r59_nilai);
        $r60 = min($r60_usia, $r60_pend, $r60_peng, $r60_nilai);

        $r61 = min($r61_usia, $r61_pend, $r61_peng, $r61_nilai);
        $r62 = min($r62_usia, $r62_pend, $r62_peng, $r62_nilai);
        $r63 = min($r63_usia, $r63_pend, $r63_peng, $r63_nilai);
        $r64 = min($r64_usia, $r64_pend, $r64_peng, $r64_nilai);
        $r65 = min($r65_usia, $r65_pend, $r65_peng, $r65_nilai);
        $r66 = min($r66_usia, $r66_pend, $r66_peng, $r66_nilai);
        $r67 = min($r67_usia, $r67_pend, $r67_peng, $r67_nilai);
        $r68 = min($r68_usia, $r68_pend, $r68_peng, $r68_nilai);
        $r69 = min($r69_usia, $r69_pend, $r69_peng, $r69_nilai);
        $r70 = min($r70_usia, $r70_pend, $r70_peng, $r70_nilai);

        $r71 = min($r71_usia, $r71_pend, $r71_peng, $r71_nilai);
        $r72 = min($r72_usia, $r72_pend, $r72_peng, $r72_nilai);
        $r73 = min($r73_usia, $r73_pend, $r73_peng, $r73_nilai);
        $r74 = min($r74_usia, $r74_pend, $r74_peng, $r74_nilai);
        $r75 = min($r75_usia, $r75_pend, $r75_peng, $r75_nilai);
        $r76 = min($r76_usia, $r76_pend, $r76_peng, $r76_nilai);
        $r77 = min($r77_usia, $r77_pend, $r77_peng, $r77_nilai);
        $r78 = min($r78_usia, $r78_pend, $r78_peng, $r78_nilai);
        $r79 = min($r79_usia, $r79_pend, $r79_peng, $r79_nilai);
        $r80 = min($r80_usia, $r80_pend, $r80_peng, $r80_nilai);

        $r81 = min($r81_usia, $r81_pend, $r81_peng, $r81_nilai);


        //Deffuzyfikasi Sugeno Weight Average
        $wa = (($r1 * 40) + ($r2 * 40) + ($r3 * 50) + ($r4 * 40) + ($r5 * 50) + ($r6 * 60) + ($r7 * 45) + ($r8 * 55) + ($r9 * 65) + ($r10 * 40) +
            ($r11 * 40) + ($r12 * 50) + ($r13 * 40) + ($r14 * 50) + ($r15 * 60) + ($r16 * 45) + ($r17 * 55) + ($r18 * 65) + ($r19 * 40) + ($r20 * 40) +
            ($r21 * 50) + ($r22 * 40) + ($r23 * 50) + ($r24 * 60) + ($r25 * 45) + ($r26 * 55) + ($r27 * 65) + ($r28 * 40) + ($r29 * 45) + ($r30 * 55) +
            ($r31 * 40) + ($r32 * 55) + ($r33 * 65) + ($r34 * 45) + ($r35 * 60) + ($r36 * 70) + ($r37 * 40) + ($r38 * 50) + ($r39 * 60) + ($r40 * 40) +
            ($r41 * 60) + ($r42 * 70) + ($r43 * 50) + ($r44 * 65) + ($r45 * 75) + ($r46 * 40) + ($r47 * 45) + ($r48 * 55) + ($r49 * 40) + ($r50 * 55) +
            ($r51 * 65) + ($r52 * 45) + ($r53 * 60) + ($r54 * 70) + ($r55 * 45) + ($r56 * 50) + ($r57 * 60) + ($r58 * 45) + ($r59 * 60) + ($r60 * 70) +
            ($r61 * 60) + ($r62 * 65) + ($r63 * 75) + ($r64 * 50) + ($r65 * 60) + ($r66 * 70) + ($r67 * 60) + ($r68 * 70) + ($r69 * 80) + ($r70 * 70) +
            ($r71 * 80) + ($r72 * 90) + ($r73 * 50) + ($r74 * 55) + ($r75 * 65) + ($r76 * 50) + ($r77 * 65) + ($r78 * 75) + ($r79 * 55) + ($r80 * 70) +
            ($r81 * 80)) /
            ($r1 + $r2 + $r3 + $r4 + $r5 + $r6 + $r7 + $r8 + $r9 + $r10 +
                $r11 + $r12 + $r13 + $r14 + $r15 + $r16 + $r17 + $r18 + $r19 + $r20 +
                $r21 + $r22 + $r23 + $r24 + $r25 + $r26 + $r27 + $r28 + $r29 + $r30 +
                $r31 + $r32 + $r33 + $r34 + $r35 + $r36 + $r37 + $r38 + $r39 + $r40 +
                $r41 + $r42 + $r43 + $r44 + $r45 + $r46 + $r47 + $r48 + $r49 + $r50 +
                $r51 + $r52 + $r53 + $r54 + $r55 + $r56 + $r57 + $r58 + $r59 + $r60 +
                $r61 + $r62 + $r63 + $r64 + $r65 + $r66 + $r67 + $r68 + $r69 + $r70 +
                $r71 + $r72 + $r73 + $r74 + $r75 + $r76 + $r77 + $r78 + $r79 + $r80 + $r81);

        $data = [
            'id_karyawan' => $id_karyawan,
            'h_um' => $h_um, 'h_ud' => $h_ud, 'h_ut' => $h_ut,
            'h_pend_smp' => $h_pend_smp, 'h_pend_sma' => $h_pend_sma, 'h_pend_diploma' => $h_pend_diploma,
            'h_peng_s' => $h_peng_s, 'h_peng_sg' => $h_peng_sg, 'h_peng_b' => $h_peng_b,
            'h_nt_r' => $h_nt_r, 'h_nt_s' => $h_nt_s, 'h_nt_t' => $h_nt_t,
        ];

        $data2 = [
            'id_karyawan' => $id_karyawan,
            'r1' => $r1, 'r2' => $r2, 'r3' => $r3, 'r4' => $r4, 'r5' => $r5, 'r6' => $r6, 'r7' => $r7, 'r8' => $r8, 'r9' => $r9, 'r10' => $r10,
            'r11' => $r11, 'r12' => $r12, 'r13' => $r13, 'r14' => $r14, 'r15' => $r15, 'r16' => $r16, 'r17' => $r17, 'r18' => $r18, 'r19' => $r19, 'r20' => $r20,
            'r21' => $r21, 'r22' => $r22, 'r23' => $r23, 'r24' => $r24, 'r25' => $r25, 'r26' => $r26, 'r27' => $r27, 'r28' => $r28, 'r29' => $r29, 'r30' => $r30,
            'r31' => $r31, 'r32' => $r32, 'r33' => $r33, 'r34' => $r34, 'r35' => $r35, 'r36' => $r36, 'r37' => $r37, 'r38' => $r38, 'r39' => $r39, 'r40' => $r40,
            'r41' => $r41, 'r42' => $r42, 'r43' => $r43, 'r44' => $r44, 'r45' => $r45, 'r46' => $r46, 'r47' => $r47, 'r48' => $r48, 'r49' => $r49, 'r50' => $r50,
            'r51' => $r51, 'r52' => $r52, 'r53' => $r53, 'r54' => $r54, 'r55' => $r55, 'r56' => $r56, 'r57' => $r57, 'r58' => $r58, 'r59' => $r59, 'r60' => $r60,
            'r61' => $r61, 'r62' => $r62, 'r63' => $r63, 'r64' => $r64, 'r65' => $r65, 'r66' => $r66, 'r67' => $r67, 'r68' => $r68, 'r69' => $r69, 'r70' => $r70,
            'r71' => $r71, 'r72' => $r72, 'r73' => $r73, 'r74' => $r74, 'r75' => $r75, 'r76' => $r76, 'r77' => $r77, 'r78' => $r78, 'r79' => $r79, 'r80' => $r80,
            'r81' => $r81
        ];

        $data3 = [
            'id_karyawan' => $id_karyawan,
            'nilai_fuzzy' => $wa
        ];

        $cek = $this->fuzzy_m->cekData($id_karyawan);
        if ($cek->num_rows() >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            DATA SUDAH DI PROSES FUZZY SUGENO</div>');
            redirect('prosessugeno/index');
        } else {
            $this->fuzzy_m->i_derajat_keanggotaan($data);
            $this->fuzzy_m->i_rule_nilai($data2);
            $this->fuzzy_m->e_data_karyawan($data3);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                DATA BERHASIL DI PROSES DENGAN METODE FUZZY SUGENO</div>');
            redirect('prosessugeno/index');
        }
    }

    public function detail_fuzzy($id)
    {
        $tampil_detail['detail_derajat'] =  $this->fuzzy_m->getId_nilai_derajat($id);
        $tampil_detail['detail_rule'] =  $this->fuzzy_m->getId_nilai_rule($id);
        $tampil_detail['detail_karyawan'] =  $this->fuzzy_m->getId_karyawan($id);
        $this->template->load('templates/index', 'proses_fuzzy/fuzzyfikasi', $tampil_detail);
    }

    public function delete_proses_fuzzy($id)
    {
        $cek = $this->fuzzy_m->cekData($id)->num_rows();

        if ($cek > 0) {
            $this->fuzzy_m->d_nilai_derajat($id);
            $this->fuzzy_m->d_nilai_rule($id);
            $this->fuzzy_m->d_nilai_karyawan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                DATA NILAI FUZZY BERHASIL DIHAPUS</div>');
            redirect('prosessugeno/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                DATA NILAI FUZZY TELAH TIDAK ADA</div>');
            redirect('prosessugeno/index');
        }
    }
}
