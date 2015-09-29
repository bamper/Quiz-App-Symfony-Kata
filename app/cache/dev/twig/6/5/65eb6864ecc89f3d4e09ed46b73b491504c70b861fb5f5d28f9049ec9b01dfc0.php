<?php

/* base.html.twig */
class __TwigTemplate_d26151d094ccf30b72b04e29fe9063e5103b65689ba88d174ad3a583a6cd4e32 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7d610db45127dbb71be9bf381d64676d5ff7d2f8a37cd0c76f50ce75088978ca = $this->env->getExtension("native_profiler");
        $__internal_7d610db45127dbb71be9bf381d64676d5ff7d2f8a37cd0c76f50ce75088978ca->enter($__internal_7d610db45127dbb71be9bf381d64676d5ff7d2f8a37cd0c76f50ce75088978ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_7d610db45127dbb71be9bf381d64676d5ff7d2f8a37cd0c76f50ce75088978ca->leave($__internal_7d610db45127dbb71be9bf381d64676d5ff7d2f8a37cd0c76f50ce75088978ca_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_23dfdb9982015b97e2332cc58abcff99ad1b31dbc0b1d2cf7d217619ea903a91 = $this->env->getExtension("native_profiler");
        $__internal_23dfdb9982015b97e2332cc58abcff99ad1b31dbc0b1d2cf7d217619ea903a91->enter($__internal_23dfdb9982015b97e2332cc58abcff99ad1b31dbc0b1d2cf7d217619ea903a91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_23dfdb9982015b97e2332cc58abcff99ad1b31dbc0b1d2cf7d217619ea903a91->leave($__internal_23dfdb9982015b97e2332cc58abcff99ad1b31dbc0b1d2cf7d217619ea903a91_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_2ca1c7f94c28b897a39aa87f360246ab1b1478bbbce8ffb9b05200633b84e380 = $this->env->getExtension("native_profiler");
        $__internal_2ca1c7f94c28b897a39aa87f360246ab1b1478bbbce8ffb9b05200633b84e380->enter($__internal_2ca1c7f94c28b897a39aa87f360246ab1b1478bbbce8ffb9b05200633b84e380_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_2ca1c7f94c28b897a39aa87f360246ab1b1478bbbce8ffb9b05200633b84e380->leave($__internal_2ca1c7f94c28b897a39aa87f360246ab1b1478bbbce8ffb9b05200633b84e380_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_c58478851a38f5e254af71d7334175afafea216444dc66b06b7d7af5311111e3 = $this->env->getExtension("native_profiler");
        $__internal_c58478851a38f5e254af71d7334175afafea216444dc66b06b7d7af5311111e3->enter($__internal_c58478851a38f5e254af71d7334175afafea216444dc66b06b7d7af5311111e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_c58478851a38f5e254af71d7334175afafea216444dc66b06b7d7af5311111e3->leave($__internal_c58478851a38f5e254af71d7334175afafea216444dc66b06b7d7af5311111e3_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_acaa59c4c9392ad25a64e5e9f9a3e830fd9c6f0b769d82ec90b140918314ab61 = $this->env->getExtension("native_profiler");
        $__internal_acaa59c4c9392ad25a64e5e9f9a3e830fd9c6f0b769d82ec90b140918314ab61->enter($__internal_acaa59c4c9392ad25a64e5e9f9a3e830fd9c6f0b769d82ec90b140918314ab61_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_acaa59c4c9392ad25a64e5e9f9a3e830fd9c6f0b769d82ec90b140918314ab61->leave($__internal_acaa59c4c9392ad25a64e5e9f9a3e830fd9c6f0b769d82ec90b140918314ab61_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
