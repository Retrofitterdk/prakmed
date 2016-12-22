<?php
$mypost = array( 'post_type' => 'prakmed_article', );
$post_types = get_post_type('', 'prakmed_article');
$loop = new WP_Query( $mypost );
//var_dump($post_types);
?>

<!-- Display all terms -->
<h1>All terms</h1>
<?php
$sections = get_terms([
    'taxonomy' => 'section',
    'hide_empty' => false,
]);
//var_dump($sections);
$output = '<ul>';
foreach($sections as $section) {
  $output .= '<li>' . $section->name . '</li>';
}
$output .= '</ul>';
echo $output;
?>
<hr />
<!-- Cycle through all posts [THE LOOP] -->
<?php while ( $loop->have_posts() ) : $loop->the_post();?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <!-- Display featured image -->
      <div style="float: top; margin: 10px">
        <?php the_post_thumbnail( array( 100, 100 ) ); ?>
      </div>

      <!-- Display custom post type prakmed_article and taxonomies -->
      <strong>Article title: </strong>
      <?php the_title(); ?><br />

      <strong>Subject:</strong>
      <?php the_terms( $post->ID, 'prakmed_subjects', '' ); ?><br />

      <strong>ICPC-2: </strong>
      <?php the_terms( $post->ID, 'ICPC-2', '' ); ?><br />

      <strong>DSM-5: </strong>
      <?php the_terms( $post->ID, 'DSM-5', '' ); ?><br />

      <strong>ICD-10 </strong>
      <?php the_terms( $post->ID, 'ICD-10', '' ); ?><br />

      <strong>Related drugs </strong>
      <?php get_post_meta( get_the_id(), 'prakmed_related_drugs', '' ); ?><br />

    </header>

    <!-- Display post content -->
    <div class="entry-content">
      <strong>Content</strong>
      <?php the_content(); ?>
    </div>
    <hr/>
  </article>
<?php endwhile;  ?>
