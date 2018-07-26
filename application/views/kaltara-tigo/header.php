
    <?php

echo "<div class='wrapper'>			
	<div class='header-logo'>
        "; ?>

<div class="row">
    <div class="col-sm">
      <img class="responsive" src="<?php echo base_url(); ?>/asset/img_header/logoBAWASLUok.gif" alt="BAWASLU KALTARA" height="110" width="110" style="float:left">
    <img class="responsive" src="<?php echo base_url(); ?>/asset/img_header/NAMABAWASLU.png" alt="BAWASLU KALTARA" height="110" width="850" style="float:left">


    </div>


     <div class="col-sm">
         <marquee behavior="scroll" direction="left" scrolldelay="200"><h2>Bersama Rakyat Awasi Pemilu,  Bersama BAWASLU tegakkan keadilan pemilu</h2></marquee>

    </div>
    <br><br>   
    <?php
    
    echo "<span class='city'><h3>
		  ".hari_ini(date('w')).", ".tgl_indo(date('Y-m-d')).", <span id='jam'></3></span><div class='header-addons'><div class='header-search'>
			".form_open('berita/index')."
				<input type='text' placeholder='Search something..'' name='kata' class='search-input' required/>
				<input type='submit' value='Search' name='cari' class='search-button'/>
			</form>
		</div></div>";
    ?>
    
</div>
    




        <?php
		  //$iden = $this->model_utama->view('identitas')->row_array();
		  //$logo = $this->model_utama->view_ordering_limit('logo','id_logo','DESC',0,1);
		 // foreach ($logo->result_array() as $row) {
		//	echo "<a href='".base_url()."'><img src='".base_url()."asset/logo/$row[gambar]'/></a>";
		//  }
	echo "</div>	

		
	<div class='header-addons'>
		
                ";
        ?>

<iframe src="//slideful.com/v20180701_2329749689223257_ijf.htm?v=24&r=528245213" frameborder="0" style="border:0px;padding:0px;margin:0px;width:175px;height:225px;" allowtransparency="true">
</iframe> 
 
<?php
echo	"</div>
</div> "; ?>

<div class="main-menu sticky" style="background: #b17506;">
<?php echo "	
	<div class='wrapper'>";
		function main_menu() {
			$ci = & get_instance();
	        $query = $ci->db->query("SELECT id_menu, nama_menu, link, id_parent FROM menu where aktif='Ya' AND position='Bottom' order by urutan");
	        $menu = array('items' => array(),'parents' => array());
	        foreach ($query->result() as $menus) {
	            $menu['items'][$menus->id_menu] = $menus;
	            $menu['parents'][$menus->id_parent][] = $menus->id_menu;
	        }
	        if ($menu) {
	            $result = build_main_menu(0, $menu);
	            return $result;
	        }else{
	            return FALSE;
	        }
	    }

		function build_main_menu($parent, $menu) {
	        $html = "";
	        if (isset($menu['parents'][$parent])) {
	        	if ($parent=='0'){
		            $html .= "<ul class='the-menu'>";
		        }else{
		        	$html .= "<ul>";
		        }
	            foreach ($menu['parents'][$parent] as $itemId) {
	                if (!isset($menu['parents'][$itemId])) {
	                    if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
	                        $html .= "<li><a target='_BLANK' href='".$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
	                    }else{
	                        $html .= "<li><a href='".base_url().''.$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
	                    }
	                }
	                if (isset($menu['parents'][$itemId])) {
	                    if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
	                        $html .= "<li><a target='_BLANK' href='".$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span></a>";
	                    }else{
	                        $html .= "<li><a href='".base_url().''.$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span></a>";
	                    }
	                    $html .= build_main_menu($itemId, $menu);
	                    $html .= "</li>";
	                }
	            }
	            $html .= "</ul>";
	        }
	        return $html;
	    }
	    echo main_menu();
	echo "</div>
</div>
";
                ?>

