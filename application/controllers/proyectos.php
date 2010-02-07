<?php
class Proyectos extends Controller{
    function Proyectos() {
        parent::Controller();
        $this->load->model('proyect_model');
        $this->load->helper('text');
    }

    /*
     * FUNCTIONS PUBLIC
     */
    function index(){
        $data = $this->proyect_model->get_list();
        $this->load->view('proyectos_view', array('listProyects'=>$data));
    }

    function get_date_diff(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $date1 = explode("/", $_POST['date1']);
            $date2 = explode("/", $_POST['date2']);

            $d1 = mktime(0,0,0,$date1[1],$date1[0], $date1[2]);
            $d2 = mktime(0,0,0,$date2[1],$date2[0], $date2[2]);
            if( $d2<$d1 ){
                die("error");
            }

            $days  = $date2[0] - $date1[0];
            $month = $date2[1] - $date1[1];
            $year  = $date2[2] - $date1[2];

            //ajuste de posible negativo en $days
            if( $days < 0 ){
                --$month;

                //ahora hay que sumar a $days los dias que tiene el mes anterior de la fecha actual
                switch( $date2[1] ) {
                   case 1: $before_day=31; break;
                   case 2: $before_day=31; break;
                   case 3:
                    if( checkdate(2, 29, $date2[2]) ){
                        $before_day=29; break;
                    }else{
                        $before_day=28; break;
                    }
                   case 4: $before_day=31; break;
                   case 5: $before_day=30; break;
                   case 6: $before_day=31; break;
                   case 7: $before_day=30; break;
                   case 8: $before_day=31; break;
                   case 9: $before_day=31; break;
                   case 10: $before_day=30; break;
                   case 11: $before_day=31; break;
                   case 12: $before_day=30; break;
                }
                $days = $days + $before_day;
            }

            //ajuste de posible negativo en $month
            if( $month < 0 ){
                --$year;
                $month = $month + 12;
            }

            if( $year>0 && $month>0 && $days>0 ){
                $s1 = $year>1  ? "s" : "";
                $s2 = $month>1 ? "s" : "";
                $s3 = $days>1  ? "s" : "";
                echo "$year a&ntilde;o$s1 con $month mese$s2 y $days d&iacute;a$s3";

            }elseif( $year==0 && $month>0 && $days>0 ){
                $s1 = $month>1 ? "s" : "";
                $s2 = $days>1  ? "s" : "";
                echo "$month mese$s1 y $days d&iacute;a$s2";
            }elseif( $year==0 && $month==0 && $days>0 ){
                $s2 = $days>1  ? "s" : "";
                echo "$days d&iacute;a$s2";
            }else{
                echo "0 d&iacute;a";
            }

            die();
        }
    }

}
?>