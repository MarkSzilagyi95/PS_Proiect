<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Intrari_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function adu_list_produse_si_ambalaje($text)
    {
        return $this->db
            ->query(" SELECT * FROM (
                            SELECT produs.denumire from produs 
                            union all 
                            SELECT ambalaj.denumire from ambalaj
                        ) as src
                        WHERE src.denumire LIKE '%" . $text . "%'
                        ORDER BY src.denumire ASC")
            ->result_array();
    }

    public function getIntrari($post)
    {
        $intrari_dupa_data = "";
        if(isset($post['start_date'])) {
            $intrari_dupa_data = " WHERE date(src.date_in) >= '".$post['start_date']."'
                        AND date(src.date_in) <= '".$post['end_date']."'";
        }


        if (isset($post['intrari_dupa'])) {
            switch ($post['intrari_dupa']) {
                case 'Produse': {
                    return $this->db
                        ->query(" SELECT * FROM (
                            SELECT produs.denumire, 'Produs' as tip, intrari.date_in, intrari.cantitate, intrari.id from intrari
                            LEFT JOIN produs ON produs.id = intrari.produs_id
                            WHERE intrari.produs_id IS NOT NULL
                        ) as src
                        " . $intrari_dupa_data . "
                        ORDER BY src.date_in DESC,src.id DESC")
                        ->result_array();
                }
                case 'Ambalaje': {
                    return $this->db
                            ->query(" SELECT * FROM (
                                SELECT ambalaj.denumire, 'Ambalaj' as tip, date_in, cantitate, intrari.id from intrari
                                LEFT JOIN ambalaj ON ambalaj.id = intrari.ambalaj_id
                                WHERE intrari.ambalaj_id IS NOT NULL
                            ) as src
                            " . $intrari_dupa_data . "
                            ORDER BY src.date_in DESC,src.id DESC")
                        ->result_array();
                }
            }
        }

        return $this->db
            ->query(" SELECT * FROM (
            SELECT produs.denumire, 'Produs' as tip, intrari.date_in, intrari.cantitate, intrari.id from intrari
            LEFT JOIN produs ON produs.id = intrari.produs_id
            WHERE intrari.produs_id IS NOT NULL
            union all 
            SELECT ambalaj.denumire, 'Ambalaj' as tip, date_in, cantitate, intrari.id from intrari
            LEFT JOIN ambalaj ON ambalaj.id = intrari.ambalaj_id
            WHERE intrari.ambalaj_id IS NOT NULL
        ) as src
        " . $intrari_dupa_data . "
        ORDER BY src.date_in DESC,src.id DESC"
        )
            ->result_array();
    }

    public function adaugaIntrare($post)
    {
        $produs = $this->db->Select('id')->from('produs')->where('denumire', $post['cautare'])->get()->result_array();
        $ambalaj = $this->db->Select('id')->from('ambalaj')->where('denumire', $post['cautare'])->get()->result_array();
        if (empty($produs) && empty($ambalaj)) {
            return ['message' => 'Produsul sau Ambalaj nu a fost gasit in baza de date!'];
        }
        // print_r($produs);
        // print_r($ambalaj);
        $id = empty($produs) ? $ambalaj[0]['id'] : $produs[0]['id']; ## adu id-ul produsului sau ambalajului

        if (empty($produs)) {
            $this->db->query("INSERT INTO intrari (ambalaj_id,cantitate) VALUES('" . $id . "','" . $post['cantitate'] . "')");
        } else {
            $this->db->query("INSERT INTO intrari (produs_id,cantitate) VALUES('" . $id . "','" . $post['cantitate'] . "')");
        }

        return ['message' => 'success'];
    }
}
