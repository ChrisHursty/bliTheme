<?php
// Template Part for Content Area of the 'Attractions' Page
?>

<?php
$post = get_post(3576); 
$content = $post->post_content;
echo $content;
?>