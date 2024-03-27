<?php





/*

    * Plugin Name: Add App Submenu

*/


function add_my_stylesheet($hook) 
{
  if ( $hook === 'posts_page_add-app' ) {
    wp_enqueue_style('bootstrap-css', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
    wp_enqueue_script( 'bootstrap-js1', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script( 'bootstrap-js2', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script( 'bootstrap-js3', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
    wp_enqueue_script( 'bootstrap-js4', '//code.jquery.com/jquery-3.3.1.min.js');
    wp_enqueue_style( 'myCSS', plugins_url( 'style.css', __FILE__ ) );
    // wp_enqueue_script( 'ajaxHandle' );
    // wp_localize_script( 
    //   'ajaxHandle', 
    //   'ajax_object', 
    //   array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) 
    // );
  }
}

add_action('admin_enqueue_scripts', 'add_my_stylesheet');

function add_sub_menu(){

  add_submenu_page('edit.php', "Add App", "Add New App", "manage_options", "add-app", "callback_fn");

}

add_action('admin_menu', 'add_sub_menu');

function pluginprefix_activate() {
  global $wpdb; 
  include_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$table_name = "app_ids_info";
    $query = $wpdb->prepare( "SHOW TABLES LIKE $table_name");
    // echo $query;
    echo $wpdb->get_var($query);
    if ( ! $wpdb->get_var( $query ) == $table_name ) {
        // $main_sql_create = "CREATE TABLE $table_name";    
        // maybe_create_table($table_name, $main_sql_create );
        // echo "created";
      $sql = "CREATE TABLE $table_name (
          `id` int(11) NOT NULL,
          `dataai_link` text NOT NULL,
          `app_link` text NOT NULL,
          `app_id` varchar(255) NOT NULL,
          `app_slug` text NOT NULL,
          `name` text NOT NULL,
          `main_category` text NOT NULL,
          `sub_category` text NOT NULL,
          `desp` text NOT NULL,
          `desp_paraphrase` text NOT NULL,
          `icon` text NOT NULL,
          `combine_img` text NOT NULL,
          `version` text NOT NULL,
          `release_date` text NOT NULL,
          `updated_date` text NOT NULL,
          `summary` text NOT NULL,
          `downloads` text NOT NULL,
          `star` text NOT NULL,
          `rated_for` text NOT NULL,
          `paid` text NOT NULL,
          `changes` text NOT NULL,
          `dev` text NOT NULL,
          `dev_slug` varchar(50) NOT NULL,
          `keyword` text NOT NULL,
          `genre_id` text NOT NULL,
          `combined_version` text NOT NULL,
          `combined_rating` text NOT NULL,
          `avg_rating` text NOT NULL,
          `total_rating` text NOT NULL,
          `status` int(11) NOT NULL DEFAULT 0,
          `uploaded_status` int(11) NOT NULL DEFAULT 0,
          `post_id` int(11) NOT NULL,
          `post_slug` text NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
  
      dbDelta($sql);
  
  } 
}

register_activation_hook( __FILE__, 'pluginprefix_activate' );

function callback_fn(){
  
    $html = '
    <form class="add_app_form">
        <div class="form-group">
          <label for="link">App Link</label>
          <div class="row">
    
          <div class="col">
            <input type="text" required class="form-control" id="link" aria-describedby="app_link"
              placeholder="Enter App link">
              </div>
          <div class="col">
          <button class="btn btn-primary" id="insert_btn" >Insert</button>
    
            <!-- <button type="submit" id="fetch_btn" class="btn btn-primary">Fetch</button> -->
          </div>
          </div>
          <small id="app_link" class="form-text text-muted">Enter App Link Here.</small>
        </div>
        <div class="form-group">
          <label for="desp">Description</label>
          <textarea rows="12" type="text" class="form-control" id="desp" placeholder="Desp"></textarea>
        </div>
        <!-- <div class="form-group form-check"> -->
        <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
        <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
        <!-- </div> -->
        
      </form>
   
    
    <script type="text/javascript">
      var f_link = document.getElementById("link");
      var f_desp = document.getElementById("desp");
      var insert_btn = document.getElementById("insert_btn");
      // var fetch_btn = document.getElementById("fetch_btn");
      
    
      // $(document).ready(function () {
      //   $("form").on("submit", function (e) {
      //     e.preventDefault();
    
      //     fetch_btn.innerText = "Fetching...";
      //     fetch_btn.disabled = true;
    
      //     console.log(f_link.value);
      //     $.ajax({
      //         type: "POST",
      //         url: "https://appsrating.info/api/ajax.php",
      //         data: {
      //           id: f_link.value
      //         }
      //       })
      //       .done(function (data) {
      //         if (console && console.log) {
    
    
      //             var res = $.parseJSON(data);
      //             // console.log(data)
      //             if(res.result == "Invalid Link")
      //             {
      //               f_link.value = "";
      //               f_desp.value = "";
      //               alert("Invalid Link");
      //             }
    
      //             else
      //               f_desp.value = res.app_description;
      //               fetch_btn.innerText = "Fetch";
      //               fetch_btn.disabled = false;
      //         }
      //       });
      //   });
      // });
    
      $(document).ready(function () {
        $("form").on("submit", function (e) {
          e.preventDefault();
    
      // function insert(){
        // console.log("insert");
        
        var f_desp_value = f_desp.value;
        if(f_desp_value == "" || f_link.value == "")
            alert("Please fill both fields");
            
        else{
          insert_btn.innerText = "Inserting...";
          insert_btn.disabled = true;
          //checking if app exists
          $.ajax({
              type: "POST",
              url: "https://appsrating.info/api/check.php",
              data: {
                id: f_link.value,
              }
            })
            .done(function (data) {
              if (console && console.log) {
    
                      var res = $.parseJSON(data);
                      // console.log(data);
    
                      if(data == "Invalid Link")
                      {
    
                        f_link.value = "";
                        f_desp.value = "";
                        alert("Invalid Id");
    
                      }
    
                      else{
                          
                        if(data == "1"){
                          var update;
                          if (confirm("App already exists! Do you want to update?")) {
                              insert_btn.innerText = "Updating...";
                              update = 1;
                            } else {
                              update = 0;
                            }
                          }
                            if(update == 1 || data == "0")
                            {
                              
                              $.ajax({
                                  type: "POST",
                                  url: "https://appsrating.info/api/post.php",
                                  // url: "https://appsrating.info/api/get.php",
                                  data: {
                                    id: f_link.value,
                                    desp: f_desp_value,
                                  }
                                })
                                .done(function (data) {
                                  if (console && console.log) {
    
                                    // console.log(data);
                                    
                                    f_link.value = "";
                                    f_desp.value = "";
                                    alert("Data Inserted");
  
                                    insert_btn.innerText = "Insert";
                                    insert_btn.disabled = false;
                                
                                  }
                                });
                              }
                        }
              }
            });
    
        }
    
      });
        });
    // //
    //   }
    // else
    
    </script>
    
    ';



    echo $html;

}

?>