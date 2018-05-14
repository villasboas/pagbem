<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Executa uma funcao de imprimir input
     *
     * @param [type] $expression
     * @param string $type
     * @return void
     */
    private function __getCalledFormFunction( $expression, $type = 'fgroup' ) {

        // Obtem os parametros
        $params = explode( ',', $expression );

        // Seta as variaveis
        $form        = $params[0];
        $name        = isset( $params[1] ) ? $params[1] : $form;
        $label       = isset( $params[2] ) ? $params[2] : $name;
        $placeholder = isset( $params[3] ) ? $params[3] : $label;

        // Volta a diretiva
        return "<?php echo $type( $form, $name, $label, $placeholder ) ?>";
    }

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
           $this-> __getCalledFormFunction($expression);
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

        // Diretivas de input
        $inputsDirectives = ['option', 'femail', 'fgroup', 'fdate', 'fnumber', 'fpassword' ];
        foreach( $inputsDirectives as $directive ) {
            \Blade::directive($directive, function ($expression) use ($directive) {
                return $this-> __getCalledFormFunction($expression, $directive);
            });
        }

        \Blade::directive('errorAlert', function ($expression) {

            // Volta a diretiva
            if ( session()->get('error' ) )
                return "<div class=\"alert alert-danger\">".session()->get('error')."</div>";
        });

        \Blade::directive('successAlert', function ($expression) {

            // Volta a diretiva
            if ( session()->get('success' ) )
                return "<div class=\"alert alert-success\">".session()->get('success')."</div>";
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
