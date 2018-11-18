<?php
/**
 * ajax functionality for contact form
 * @package Dynast
 */
add_action('wp_ajax_nopriv_dap_custom_action_form', 'dap_custom_action_form');
add_action('wp_ajax_dap_custom_action_form', 'dap_custom_action_form');


	
	function dap_custom_action_form()
{
    $username = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $args = array(
        'post_title' => $username,
        'post_content' => $message,
        'meta_input' => array(
            '_contact_email_value_key' => $email,
        ),
        'post_author' => 1,
        'post_status' => 'publish',
        'post_type' => 'dap-contact',
        
    );

    $contactID = wp_insert_post($args);
        if ($contactID !== 0) {
                $admin_email = get_bloginfo('admin_email');
                $customer_email  = $email;
                $subject = 'Dynast Contact Form -  ' .$username;
                
                $thank = '
                    <body style="margin:0;padding:0;box-sizing:border-box;">
                        <div style="margin:100px auto 0;width:800px;height:auto;padding:80px 100px;background:#6ac0c3;">
                            <header style="{width:70px;height:70px;display:block;margin:auto;">
                                hello '.$username.';
                            </header>
                            <article style="margin:50px 0 60px">
                                <h1 style="margin:20px;text-align:justify;font-size:18px;font-weight:300;font-family:tahoma;color:#778899;word-spacing:-2px;letter-spacing:.4px;">
                                        Thanks for contact
                                </h1>
                                <p style="margin:5px;text-align:justify;font-size:18px;font-weight:300;font-family:tahoma;color:#778899;word-spacing:-2px;letter-spacing:.4px;">
                                    I will contact with you as soon as possible
                                </p>
                            </article>
                            <footer style="text-align:center;text-transform:uppercase;">
                                <a href="'.get_bloginfo('url').'" style="text-decoration:none;background:#17585a;padding:20px;margin-top:20px;line-height:5;color:#778899;">Click</a>
                            </footer>
                        </div>
                    </body>
                ';
                $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; 
                $headers[] = 'Reply-To: '.$username.' <'.$email.'>';
                $headers[] = 'Content-Type: text/html: charset=UTF-8';

                wp_mail($admin_email, $subject, $message, $headers);
                wp_mail($customer_email, $subject, $thank, $headers );
            }
    echo $contactID;

    die();
}