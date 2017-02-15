<?php

//namespace App\Libs;

Class TApp{

    protected $to;
    protected $method;
    protected $params = null;
        
    public function __construct(){
        
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = rtrim($url,'/');
        //echo $url;
        //$url = self::parseUrl($url);
        
        if ($url){
            // cadastro-de-pessoas / listar-por-codigo / 10
            $arr = explode('/', filter_var(rtrim($url), FILTER_SANITIZE_URL));
            if(isset($arr[0])){
                //cadastro-de-pessoas para //CadastroDePessoas
                $to = strtolower($arr[0]);
                $to = explode('-',$to);
                $strTo = '';
                foreach($to as $key => $value){
                    $strTo.= strtoupper(substr($value,0,1)) . substr($value,1);
                }
                $this->to = $strTo;
                //echo 'to='.$strTo . '<br />';
            }
            if(isset($arr[1])){
                $mt = strtolower($arr[1]);
                $mt = explode("-",$mt);
                $strMt = '';
                foreach($mt as $key => $value){
                    if ($key === 0){
                        $strMt.= $value;    
                    } else {
                        $strMt.= strtoupper(substr($value,0,1)) . substr($value,1);
                    }
                }
                $this->method = $strMt;
                //echo 'method='.$strMt . '<br />';
            }
            unset($arr[0]);
            unset($arr[1]);
            $this->params = $arr;
        } else {
            $this->to = "ControleLogin";
            $this->method = "login";
            $this->params = null;
        }
        // echo isset($this->to) ? 'to='.$this->to.'<br />': '';
        // echo isset($this->method) ? 'method='.$this->method.'<br />': '';
        // echo isset($this->params) ? 'params='.$this->params.'<br />': '';
    }
    
    public function executar(){
        // echo isset($this->to) ? 'to='.$this->to.'<br />': '';
        // echo 'class_exists($this->to)=';
        // echo class_exists($this->to) ? 'true' : 'false';
        // echo '<br />';

        if(class_exists($this->to)) {
            try {
                $c = new $this->to();  // chamada do construtor
                //$c = new App\To\ControleLogin();

                // echo 'TApp.executar - '. $this->to . '<br />';
                if(method_exists($c, $this->method)){
                    // echo 'TApp.executar - '. $this->method . '<br />';
                    if ( $this->params !== null) {
                        $c->{$this->method}($this->params);
                    } else{
                        $c->{$this->method}();
                    }
                } else{
                    // tratar erro
                }
            } catch (Exception $e) {
                Echo "Erro ao executar - ".$e->getMessage(); //getTraceAsString();
            }
            
        }

        //return explode("/", filter_var(rtrim($url), FILTER_SANITIZE_URL));
    }

}
?>
