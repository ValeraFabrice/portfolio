<?php
include_once plugin_dir_path(__FILE__).'/newsletterwidget.php';

class Newsletter 
{
    public function __construct()
    {
        // initialisation du widget
        add_action('widgets_init', function(){register_widget('Newsletter_Widget');});
        // lorsque le bouton submit est enclenché dans ma newsletter, j'execute ma méthode save_email()
        add_action('wp_loaded', array($this, 'save_email'));
    }

    public static function install()
    {

        global $wpdb; // word press data base - vous y avez acces partout dans le code.

        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL); ");
    }

    public static function uninstall()
    {
        global $wpdb; // word press data base - vous y avez accès partout dans le code.
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}newsletter_email;"); 
    }

    // Voici une méthode qui va nous permettre d'enregistrer dans la base de données, dans la TABLE wp_newsletter_email les id et emails de tous nos abonnés.

    public function save_email()
    {
        // verification de la requete post : la variable email existe-t-elle? est ce que la personne a bien mis son email dans le formulaire de newsletter?
        if(isset($_POST['newsletter_email']) && !empty($_POST['newsletter_email'])) 
        {
            // on appelle la variable globale de gestion de base de données
            global $wpdb;
            // recuperation du contenu mis en newsletter dans la variable $email
            $email= $_POST['newsletter_email'];
            // verification si la personne est (ou pas) deja inscrite dans la base des abonnés
            $row= $wpdb->get_row("SELECT * FROM {$wpdb->prefix}newsletter_email WHERE email='$email'");
            if(is_null($row))
            {
                // si l'abonné n'existe pas dans la base alors l'insérer
                $wpdb->insert("{$wpdb->prefix}newsletter_email", array('email'=> $email));
            }   
        }
    }
}