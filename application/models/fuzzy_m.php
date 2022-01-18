<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fuzzy_m extends CI_Model
{
    public function get_karyawan()
    {
        $this->db->from('data_karyawan');
        return $this->db->get();
    }

    public function cekData($id_karyawan)
    {
        $this->db->from('nilai_derajat');
        $this->db->where('id_karyawan', $id_karyawan);
        $query = $this->db->get();
        return $query;
    }

    public function e_data_karyawan($data3)
    {
        $id_kar = $data3['id_karyawan'];
        $fuzzy = $data3['nilai_fuzzy'];

        $sql = "UPDATE data_karyawan SET nilai_fuzzy = '$fuzzy' WHERE id_karyawan ='$id_kar'";
        $this->db->query($sql);
    }

    public function i_derajat_keanggotaan($data)
    {
        $data = [
            'id_karyawan' => $data['id_karyawan'],
            'usia_muda' => $data['h_um'],
            'usia_dewasa' => $data['h_ud'],
            'usia_tua' => $data['h_ut'],

            'pend_smp' => $data['h_pend_smp'],
            'pend_sma' => $data['h_pend_sma'],
            'pend_diploma' => $data['h_pend_diploma'],

            'peng_sedikit' => $data['h_peng_s'],
            'peng_sedang' => $data['h_peng_sg'],
            'peng_banyak' => $data['h_peng_b'],

            'nilai_rendah' => $data['h_nt_r'],
            'nilai_sedang' => $data['h_nt_s'],
            'nilai_tinggi' => $data['h_nt_t'],
        ];
        $this->db->insert('nilai_derajat', $data);
    }

    public function i_rule_nilai($data2)
    {
        $data = [
            'id_karyawan' => $data2['id_karyawan'],
            'rule1' => $data2['r1'], 'rule2' => $data2['r2'], 'rule3' => $data2['r3'], 'rule4' => $data2['r4'], 'rule5' => $data2['r5'],
            'rule6' => $data2['r6'], 'rule7' => $data2['r7'], 'rule8' => $data2['r8'], 'rule9' => $data2['r9'], 'rule10' => $data2['r10'],
            'rule11' => $data2['r11'], 'rule12' => $data2['r12'], 'rule13' => $data2['r13'], 'rule14' => $data2['r14'], 'rule15' => $data2['r15'],
            'rule16' => $data2['r16'], 'rule17' => $data2['r17'], 'rule18' => $data2['r18'], 'rule19' => $data2['r19'], 'rule20' => $data2['r20'],
            'rule21' => $data2['r21'], 'rule22' => $data2['r22'], 'rule23' => $data2['r23'], 'rule24' => $data2['r24'], 'rule25' => $data2['r25'],
            'rule26' => $data2['r26'], 'rule27' => $data2['r27'], 'rule28' => $data2['r28'], 'rule29' => $data2['r29'], 'rule30' => $data2['r30'],

            'rule31' => $data2['r31'], 'rule32' => $data2['r32'], 'rule33' => $data2['r33'], 'rule34' => $data2['r34'], 'rule35' => $data2['r35'],
            'rule36' => $data2['r36'], 'rule37' => $data2['r37'], 'rule38' => $data2['r38'], 'rule39' => $data2['r39'], 'rule40' => $data2['r40'],
            'rule41' => $data2['r41'], 'rule42' => $data2['r42'], 'rule43' => $data2['r43'], 'rule44' => $data2['r44'], 'rule45' => $data2['r45'],
            'rule46' => $data2['r46'], 'rule47' => $data2['r47'], 'rule48' => $data2['r48'], 'rule49' => $data2['r49'], 'rule50' => $data2['r50'],
            'rule51' => $data2['r51'], 'rule52' => $data2['r52'], 'rule53' => $data2['r53'], 'rule54' => $data2['r54'], 'rule55' => $data2['r55'],

            'rule56' => $data2['r56'], 'rule57' => $data2['r57'], 'rule58' => $data2['r58'], 'rule59' => $data2['r59'], 'rule60' => $data2['r60'],
            'rule61' => $data2['r61'], 'rule62' => $data2['r62'], 'rule63' => $data2['r63'], 'rule64' => $data2['r64'], 'rule65' => $data2['r65'],
            'rule66' => $data2['r66'], 'rule67' => $data2['r67'], 'rule68' => $data2['r68'], 'rule69' => $data2['r69'], 'rule70' => $data2['r70'],
            'rule71' => $data2['r71'], 'rule72' => $data2['r72'], 'rule73' => $data2['r73'], 'rule74' => $data2['r74'], 'rule75' => $data2['r75'],

            'rule76' => $data2['r76'], 'rule77' => $data2['r77'], 'rule78' => $data2['r78'], 'rule79' => $data2['r79'], 'rule80' => $data2['r80'],
            'rule81' => $data2['r81']
        ];
        $this->db->insert('rule_nilai', $data);
    }

    public function getId_nilai_derajat($id)
    {
        return $this->db->get_where('nilai_derajat', ['id_karyawan' => $id])->row_array();
    }

    public function getId_nilai_rule($id)
    {
        return $this->db->get_where('rule_nilai', ['id_karyawan' => $id])->row_array();
    }

    public function getId_karyawan($id)
    {
        return $this->db->get_where('data_karyawan', ['id_karyawan' => $id])->row_array();
    }

    public function d_nilai_derajat($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->delete('nilai_derajat');
    }

    public function d_nilai_rule($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->delete('rule_nilai');
    }

    public function d_nilai_karyawan($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->set('nilai_fuzzy', '0');
        $this->db->update('data_karyawan');
    }
}
