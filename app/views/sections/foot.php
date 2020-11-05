 </div>

 <?php
    if (URI1 == 'home') {
        if (!isset($_SESSION[SESS]['member'])) {
    ?>
         <div class="container">
             <a href="<?= SITE ?>/member/login">
                 <img src="<?= SITE ?>/public/images/ads.png" width="1024" height="100" class="m" />
             </a>
         </div>
     <?php
        }
    }

    if (URI1 != 'admin') {
        if (!isset($_SESSION[SESS]['admin'])) {

            $latest_items = $this->db->fetch("SELECT * FROM items ORDER BY id_item DESC LIMIT 4");
            $kategori = $this->db->fetch("SELECT * FROM kategori ORDER BY kategori ASC LIMIT 4");
            $lokasi = $this->db->fetch("SELECT * FROM lokasi ORDER BY lokasi ASC LIMIT 4");
            $main_menu = $this->db->fetch("SELECT * FROM menu WHERE status = 1 ORDER BY judul_menu ASC LIMIT 2");
            $sub_menu = $this->db->fetch("SELECT * FROM menu WHERE status = 2 ORDER BY judul_menu ASC LIMIT 4");

        ?>
         <div id="semi-footer" class="auto">
             <div class="container">
                 <div class="f_section">
                     <b>Latest Items</b>
                     <ul>
                         <li>
                             <?php
                                foreach ($latest_items as $li) {
                                    if (strlen($li['nama_item']) > 20) {
                                        $show = substr($li['nama_item'], 0, 20) . "...";
                                    } else {
                                        $show = $li['nama_item'];
                                    }
                                    echo "<a href='" . SITE . "/item/" . $li['id_item'] . "'>" . ucwords($show) . "</a>";
                                }
                                ?>
                         </li>
                     </ul>
                 </div>
                 <div class="f_section">
                     <b>Kategori</b>
                     <ul>
                         <li>
                             <?php
                                foreach ($kategori as $k) {
                                    echo "<a href='" . SITE . "/kategori/" . $k['id_kategori'] . "'>" . ucwords($k['kategori']) . "</a>";
                                }
                                ?>
                         </li>
                     </ul>
                 </div>
                 <div class="f_section">
                     <b>Cabang</b>
                     <ul>
                         <li>
                             <?php
                                foreach ($lokasi as $l) {
                                    echo "<a href='" . SITE . "/search/?q=&kat=all&lok=" . $l['id_lokasi'] . "&harga=all'>" . ucwords($l['lokasi']) . "</a>";
                                }
                                ?>
                         </li>
                     </ul>
                 </div>
                 <div class="f_section">
                     <b>Main Menu</b>
                     <ul>
                         <li>
                             <a href="<?= SITE ?>">Home</a>
                             <?php
                                foreach ($main_menu as $mm) {
                                    echo "<a href='" . SITE . "/h/" . strtolower($mm['judul_menu']) . "'>" . ucwords($mm['judul_menu']) . "</a>";
                                }
                                ?>
                             <a href="<?= SITE ?>/h/sitemap">Sitemap</a>
                         </li>
                     </ul>
                 </div>
                 <div class="f_section">
                     <b>Sub Menu</b>
                     <ul>
                         <li>
                             <?php
                                foreach ($sub_menu as $sm) {
                                    echo "<a href='" . SITE . "/h/" . strtolower($sm['judul_menu']) . "'>" . ucwords($sm['judul_menu']) . "</a>";
                                }
                                ?>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     <?php
        }
    } else {
        ?>
     <div style="height:12px; width:100%;" class="pull-left"></div>
 <?php
    }
    ?>

 <?php
    if (URI1 == 'admin') { ?>
     <div id="footer" style="position:fixed; bottom:0;">
         <div class="container">
             <p class="pull-left">&copy; SembakoQu - <?php echo date('Y'); ?>. Design by <a href="https://www.linkedin.com/in/alfharizky-fauzi-20628817b/">Alfha</a></p>
             <a href="#" class="pull-right btn" style="margin-left:20px; color:#fff; ">Back to Top</a>
         </div>
     </div>

 <?php } elseif (URI1 == 'invoice') { ?>
     <div id="footer" style="position:fixed; bottom:0;">
         <div class="container">
             <p class="pull-left">&copy; SembakoQu - <?php echo date('Y'); ?>. Design by <a href="https://www.linkedin.com/in/alfharizky-fauzi-20628817b/">Alfha</a></p>
             <a href="#" class="pull-right btn" style="margin-left:20px; color:#fff; ">Back to Top</a>
         </div>
     </div>
 <?php } else { ?>
     <div id="footer">
         <div class="container">
             <p class="pull-left">&copy; SembakoQu - <?php echo date('Y'); ?>. Design by <a href="https://www.linkedin.com/in/alfharizky-fauzi-20628817b/">Alfha</a></p>
             <a href="#" class="pull-right btn" style="margin-left:20px; color:#fff;">Back to Top</a>
         </div>
     </div>
 <?php }
    ?>
 </body>
 <script src="<?= SITE ?>/public/js/script.js"></script>

 </html>