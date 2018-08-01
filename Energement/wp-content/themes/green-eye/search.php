<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <div class="ct-chart ct-perfect-fourth"></div>
    <script>
        var data = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    series: [
    [5]
  ]
};

        function myFunction() {
    data.series[0].push(4);
var movies = ["Reservoir Dogs", "Pulp Fiction", "Jackie Brown", 
"Kill Bill", "Death Proof", "Inglourious Basterds"];
 
// storing our array as a string
localStorage.setItem("quentinTarantino", JSON.stringify(movies));
 
// retrieving our data and converting it back into an array
var retrievedData = localStorage.getItem("quentinTarantino");
var movies2 = JSON.parse(retrievedData);
 
//making sure it still is an array
alert(movies2.length);
}
        myFunction();
        
var options = {
  seriesBarDistance: 15
};

var responsiveOptions = [
  ['screen and (min-width: 641px) and (max-width: 1024px)', {
    seriesBarDistance: 10,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value;
      }
    }
  }],
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
      }
    }
  }]
];

new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
    </script>
<?php 
/* 	
*/

get_header(); ?>
<div id="container">
    
	<?php if (have_posts()) : ?>
		<div id="content">
        <h1 class="echo fa-search-plus color-white"><?php echo __('Search Results', 'echo'); ?></h1>
		
		<?php $counter = 0; ?>
		<?php query_posts($query_string . "&posts_per_page=20"); ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) {
				$numposts = $wp_query->found_posts; // count # of search results ?>
				<h5 class="arc-src color-white"><span><?php echo __('Search Term:', 'echo');?> </span><?php the_search_query(); ?></h5>
				<h5 class="arc-src color-white"><span><?php echo __('Number of Results:', 'echo');?> </span><?php echo $numposts; ?></h5><br />
				<?php } //endif ?>
				<div class="post-container">
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadataw"><?php echo __('Entry Date: ', 'echo'); ?> <?php the_time('F j, Y'); ?></p>
				<h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
				<div class="content-ver-sep"></div>
  				<div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php green_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 				<p class="postmetadata"><?php echo __('Posted in', 'echo'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'echo'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'echo'), __('1 Comment &#187;', 'echo'), __('% Comments &#187;', 'echo')); ?> <?php the_tags('<br />'. __('Tags: ', 'echo'), ', ', '<br />'); ?></p>
 				</div></div></div></div>
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
        <div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries', 'echo')) ?></div>
	<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;', 'echo')) ?></div>
	</div>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
		<br /><br /><h1 class="page-title"><?php _e('Not Found', 'echo'); ?></h1>
<h5 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'echo'); ?></span></h5>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php _e('Or Return to the Home Page', 'echo'); ?></a></p><br /><br />

<h5 class="post-title-color"><?php _e('You can also Visit the Following. These are the Featured Contents', 'echo'); ?></h5>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>

	<?php endif; ?>
	
<?php get_footer(); ?>