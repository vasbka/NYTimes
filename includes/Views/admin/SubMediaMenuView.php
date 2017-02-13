<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <body>
        <div id="content" style="text-align:center;">
            <h1><?php echo $param?></h1>
            <ul>
                <li><a href="admin.php?page=NYTimes"><?php _e('Go to Main Menu')?></a></li>
                <li><a href="edit.php?page=nytimes_control_sub_posts_menu"><?php _e('Go to Sub Menu in Posts')?></a></li>
                <li><a href="upload.php?page=nytimes_control_sub_media_menu"><?php _e('Go to Sub Menu in Upload')?></a></li>
                <li><a href="edit.php?post_type=page&page=nytimes_control_sub_pages_menu"><?php _e('Go to Sub Menu in Pages')?></a></li>
                <li><a href="edit-comments.php?page=nytimes_control_sub_comments_menu"><?php _e('Go to Sub Menu in Comments')?></a></li>
                <li><a href="themes.php?page=nytimes_control_sub_theme_menu"><?php _e('Go to Sub Menu in Themes')?></a></li>
                <li><a href="plugins.php?page=nytimes_control_sub_plugins_menu"><?php _e('Go to Sub Menu in Plugins')?></a></li>
                <li><a href="users.php?page=nytimes_control_sub_users_menu"><?php _e('Go to Sub Menu in Users')?></a></li>
                <li><a href="tools.php?page=nytimes_control_sub_Management_menu"><?php _e('Go to Sub Menu in Tools')?></a></li>
                <li><a href="options-general.php?page=nytimes_control_sub_options_menu"><?php _e('Go to Sub Menu in Options')?></a></li>
            </ul>
        </div>
    </body>
</html>