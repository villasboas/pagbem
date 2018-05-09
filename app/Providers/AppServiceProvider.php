<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        // Cria a diretiva
        \Blade::directive('e', function ($expression) {
            $params = explode( ',', $expression );
            return "<?php echo __e( $params[0], $params[1] ) ?>";
        });
        \Blade::directive('bte', function ($expression) {
            return "<?php echo __bte( $expression ) ?>";
        });
        \Blade::directive('fgroup', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;
            $placeholder = isset( $params[2] ) ? $params[2] : $label;

            // Volta a diretiva
            return "<?php echo fgroup( $name, $label, $placeholder ) ?>";
        });
        \Blade::directive('select', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;

            // Volta a diretiva
            return "<?php echo select( $name, $label ) ?>";
        });
        \Blade::directive('endselect', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;

            // Volta a diretiva
            return "<?php echo endselect( $name ) ?>";
        });
        \Blade::directive('option', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;
            $selected    = isset( $params[2] ) ? $params[2] : false;

            // Volta a diretiva
            return "<?php echo option( $name, $label ) ?>";
        });
        \Blade::directive('femail', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;
            $placeholder = isset( $params[2] ) ? $params[2] : $label;

            // Volta a diretiva
            return "<?php echo fgroup( $name, $label, $placeholder, 'email' ) ?>";
        });
        \Blade::directive('fdate', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;
            $placeholder = isset( $params[2] ) ? $params[2] : $label;

            // Volta a diretiva
            return "<?php echo fdate( $name, $label, $placeholder, 'date' ) ?>";
        });
        \Blade::directive('fnumber', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;
            $placeholder = isset( $params[2] ) ? $params[2] : $label;

            // Volta a diretiva
            return "<?php echo fgroup( $name, $label, $placeholder, 'number' ) ?>";
        });
        \Blade::directive('fpassword', function ($expression) {

            // Obtem os parametros
            $params     = explode( ',', $expression );

            // Seta as variaveis
            $name        = $params[0];
            $label       = isset( $params[1] ) ? $params[1] : $name;
            $placeholder = isset( $params[2] ) ? $params[2] : $label;

            // Volta a diretiva
            return "<?php echo fpassword( $name, $label, $placeholder, 'number' ) ?>";
        });
        \Blade::directive('errorAlert', function ($expression) {

            // Volta a diretiva
            if ( session()->get('error' ) )
                return "<div class=\"alert alert-danger\">".session()->get('error')."</div>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        // Inclui os helpes
        include_once( app_path( 'Helpers/bootstrap.php' ) );
    }
}
