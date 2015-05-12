<?php
// Template Part for Content Area of the 'Merchants' Page
?>

<?php
$post = get_post(1131); 
$content = $post->post_content;
echo $content;
?>