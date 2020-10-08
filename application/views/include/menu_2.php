
            <?php
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $wewenang_user = $this->session->userdata('LEVEL_USER');
            ?> 

             <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url()."assets/" ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('username'); ?></div>
                    <div class="email"><?= $this->session->userdata('nama')." - ".$this->session->userdata('nama_wewenang'); ?></div> 
                </div>
            </div>
            <!-- #User Info --> 

            <div class="menu">  
                <ul class="list">
                    <li class="header">MAIN UTAMA</li>
                    <?php

                    $this->db->where('level_menu',1);
                    $menu1 = $this->db->get('ref_menu')->result_array();  
                    
                    // $list_menu = $this->session->userdata('menu'); 
                    $list_menu1 = $this->session->userdata('menu1'); 
                    $list_menu2 = $this->session->userdata('menu2'); 
                    $list_menu3 = $this->session->userdata('menu3');  
                    // var_dump($list_menu3);
   
                    foreach ($menu1 as $men1) {   
                        // var_dump(in_array($men1['id_menu'], $list_menu)); 

                        if (in_array($men1['id_menu'], $list_menu1) ) { ?> 

                        <li class="<?php if(strpos($actual_link, $men1['class_name']) !== false){  echo "active";} ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons"><?= $men1['icon']; ?></i>
                                <span><?= $men1['id_menu']." - ". $men1['menu_name']; ?></span>
                            </a>  

                            <?php
                                $menu2 = $this->M_login->get_menu_level2($men1['id_menu']);
                                if ($menu2->num_rows()>0)
                                { 
                                    echo "<ul class='ml-menu'>";
                                    foreach ($menu2->result_array() as $men2) {
                                        if (in_array($men2['id_menu'], $list_menu2) ) {  

                                        //cek apakah menu ini memiliki menu level selanjutnya 
                                        $cek_menu3 = $this->M_login->get_menu_level2($men2['id_menu']);
                                        if ($cek_menu3->num_rows()>0)
                                        { ?>

                                            <li class="<?php if(strpos($actual_link, $men2['class_name']) !== false){  echo "active";} ?> ">
                                                <a href="javascript:void(0);" class="menu-toggle">
                                                    <i class="material-icons">folder</i>
                                                    <span><?= $men2['id_menu'].' - '.$men2['menu_name'] ?></span>
                                                </a> 

                                                <?php
                                                    $menu3 = $this->M_login->get_menu_level2($men2['id_menu']);
                                                    if ($menu3->num_rows()>0)
                                                    { 
                                                        echo "<ul class='ml-menu'>";
                                                        foreach ($menu3->result_array() as $men3) {
                                                            if (in_array($men3['id_menu'], $list_menu3) ) { 
                                                            ?> 
                                                                <li class="<?php if(strpos($actual_link, $men3['class_name']) !== false){  echo "active";} ?> ">
                                                                    <a href="<?= base_url().$men3['class_name']; ?>"><?= $men3['id_menu']." - ".$men3['menu_name']; ?></a>
                                                                </li> 
                                                            <?php
                                                        } }
                                                        echo "</ul>";
                                                    }
                                                ?> 
                                            </li> 

                                       <?php }
                                        else{ ?>
                                            <li class="<?php if(strpos($actual_link, $men2['class_name']) !== false){  echo "active";} ?> ">
                                                <a href="<?= base_url().$men2['class_name']; ?>"><?= $men2['id_menu']." - ".$men2['menu_name']; ?></a>
                                            </li> 
                                        <?php }  
                                    }
                                    }
                                    echo "</ul>";
                                }
                            ?> 
                        </li>  
                    <?php }
                }  ?>  
                   
                </ul> 
            </div>