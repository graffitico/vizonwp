jQuery(document).ready(function($) {

var taxonomy = '';
var location = '';
var year = '';
var q = ''; 
        (function() {
            [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {    
                new SelectFx(el, {
  onChange: function(val) {
    console.log(el.id);
    console.log('val', val); //callback for value change
    
if(el.id == 'department-filter' ){
  taxonomy =  val;
}else if (el.id == 'location-filter') {
    location = val;
}else if (el.id == 'year-filter') {
    year = val;
}

       data = {
            action: 'filter_posts', // function to execute
            afp_nonce: afp_vars.afp_nonce, // wp_nonce
            taxonomy: taxonomy, // selected tag
            location: location,
            year: year,
            q: q
            };
 

get_jobs(data);






  }
});
            } );
        })();



jQuery("#search-id").click(function($) {


search_jobs();


});




jQuery("#job-s").keypress(function(e) {
    if(e.which == 13) {
      search_jobs();
    }
});




function search_jobs(){
    q = jQuery("#job-s").val();

       data = {
            action: 'filter_posts', // function to execute
            afp_nonce: afp_vars.afp_nonce, // wp_nonce
            taxonomy: taxonomy, // selected tag
            location: location,
            year: year,
            q: q
            };
 

        get_jobs(data);
}



jQuery(document).on('click' , '.apply-button' , function(){

    job_id = jQuery(this).data("id");
     console.log( job_id );
    jQuery("#application_job_id").val(job_id);
});

jQuery(document).on('click' , '.cancel-modal', function(e){
    e.preventDefault();
    jQuery('.modal').modal('hide');
});

function get_jobs(data){
            $.post( afp_vars.afp_ajax_url, data, function(response) {
 
            if( response ) {
$('#accordion').collapse();
                console.log(response);
                // Display posts on page
                $('#accordion').html( '' );
                $('#accordion').html( response );
                // Restore div visibility
                // $('#accordion').fadeIn();
            };
        });
}


});
