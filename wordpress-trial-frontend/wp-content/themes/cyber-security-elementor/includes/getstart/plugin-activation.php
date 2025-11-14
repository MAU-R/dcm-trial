<?php
if ( ! class_exists( 'Cyber_Security_Elementor_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Cyber_Security_Elementor_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Cyber_Security_Elementor_Plugin_Activation_WPElemento_Importer {

        private static $cyber_security_elementor_instance;
        public $cyber_security_elementor_action_count;
        public $cyber_security_elementor_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$cyber_security_elementor_instance) ) {
            self::$cyber_security_elementor_instance = new self();
          }
          return self::$cyber_security_elementor_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'cyber_security_elementor_recommended_plugins', array($this, 'cyber_security_elementor_recommended_elemento_importer_plugins_array') );

            $cyber_security_elementor_actions                   = $this->cyber_security_elementor_get_recommended_actions();
            $this->cyber_security_elementor_action_count        = $cyber_security_elementor_actions['count'];
            $this->cyber_security_elementor_recommended_actions = $cyber_security_elementor_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function cyber_security_elementor_recommended_elemento_importer_plugins_array($cyber_security_elementor_plugins){
            $cyber_security_elementor_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'cyber-security-elementor'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'cyber-security-elementor'),               
            );
            return $cyber_security_elementor_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'cyber-security-elementor-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('cyber-security-elementor-plugin-activation-script', 'cyber_security_elementor_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'cyber-security-elementor'),
                    'activating' => esc_html__('Activating', 'cyber-security-elementor'),
                    'error' => esc_html__('Error', 'cyber-security-elementor'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'cyber-security-elementor-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function cyber_security_elementor_get_recommended_actions() {

            $cyber_security_elementor_act_count  = 0;
            $cyber_security_elementor_actions_todo = get_option( 'recommending_actions', array());

            $cyber_security_elementor_plugins = $this->cyber_security_elementor_get_recommended_plugins();

            if ($cyber_security_elementor_plugins) {
                foreach ($cyber_security_elementor_plugins as $cyber_security_elementor_key => $cyber_security_elementor_plugin) {
                    $cyber_security_elementor_action = array();
                    if (!isset($cyber_security_elementor_plugin['slug'])) {
                        continue;
                    }

                    $cyber_security_elementor_action['id']   = 'install_' . $cyber_security_elementor_plugin['slug'];
                    $cyber_security_elementor_action['desc'] = '';
                    if (isset($cyber_security_elementor_plugin['desc'])) {
                        $cyber_security_elementor_action['desc'] = $cyber_security_elementor_plugin['desc'];
                    }

                    $cyber_security_elementor_action['name'] = '';
                    if (isset($cyber_security_elementor_plugin['name'])) {
                        $cyber_security_elementor_action['title'] = $cyber_security_elementor_plugin['name'];
                    }

                    $cyber_security_elementor_link_and_is_done  = $this->cyber_security_elementor_get_plugin_buttion($cyber_security_elementor_plugin['slug'], $cyber_security_elementor_plugin['name'], $cyber_security_elementor_plugin['function']);
                    $cyber_security_elementor_action['link']    = $cyber_security_elementor_link_and_is_done['button'];
                    $cyber_security_elementor_action['is_done'] = $cyber_security_elementor_link_and_is_done['done'];
                    if (!$cyber_security_elementor_action['is_done'] && (!isset($cyber_security_elementor_actions_todo[$cyber_security_elementor_action['id']]) || !$cyber_security_elementor_actions_todo[$cyber_security_elementor_action['id']])) {
                        $cyber_security_elementor_act_count++;
                    }
                    $cyber_security_elementor_recommended_actions[] = $cyber_security_elementor_action;
                    $cyber_security_elementor_actions_todo[]        = array('id' => $cyber_security_elementor_action['id'], 'watch' => true);
                }
                return array('count' => $cyber_security_elementor_act_count, 'actions' => $cyber_security_elementor_recommended_actions);
            }

        }

        public function cyber_security_elementor_get_recommended_plugins() {

            $cyber_security_elementor_plugins = apply_filters('cyber_security_elementor_recommended_plugins', array());
            return $cyber_security_elementor_plugins;
        }

        public function cyber_security_elementor_get_plugin_buttion($slug, $name, $function) {
                $cyber_security_elementor_is_done      = false;
                $cyber_security_elementor_button_html  = '';
                $cyber_security_elementor_is_installed = $this->is_plugin_installed($slug);
                $cyber_security_elementor_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $cyber_security_elementor_is_activeted = (class_exists($function)) ? true : false;
                if (!$cyber_security_elementor_is_installed) {
                    $cyber_security_elementor_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $cyber_security_elementor_plugin_install_url = wp_nonce_url($cyber_security_elementor_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $cyber_security_elementor_button_html        = sprintf('<a class="cyber-security-elementor-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($cyber_security_elementor_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'cyber-security-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'cyber-security-elementor')
                    );
                } elseif ($cyber_security_elementor_is_installed && !$cyber_security_elementor_is_activeted) {

                    $cyber_security_elementor_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($cyber_security_elementor_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $cyber_security_elementor_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $cyber_security_elementor_button_html = sprintf('<a class="cyber-security-elementor-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($cyber_security_elementor_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'cyber-security-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'cyber-security-elementor')
                    );
                } elseif ($cyber_security_elementor_is_activeted) {
                    $cyber_security_elementor_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'cyber-security-elementor'));
                    $cyber_security_elementor_is_done     = true;
                }

                return array('done' => $cyber_security_elementor_is_done, 'button' => $cyber_security_elementor_button_html);
            }
        public function is_plugin_installed($slug) {
            $cyber_security_elementor_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $cyber_security_elementor_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($cyber_security_elementor_installed_plugins[$cyber_security_elementor_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $cyber_security_elementor_keys = array_keys($this->get_installed_plugins());
            foreach ($cyber_security_elementor_keys as $cyber_security_elementor_key) {
                if (preg_match('|^' . $slug . '/|', $cyber_security_elementor_key)) {
                    return $cyber_security_elementor_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Cyber_Security_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();