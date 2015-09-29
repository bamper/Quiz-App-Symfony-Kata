<?php

/* AppBundle::base.html.twig */
class __TwigTemplate_65892598d08e9f8748c8b3eee183683a4683314853f89cc9efb55188e4349921 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e44f5d17826e29b4b62bfc277d43e35ed7fac71685ecc9eab378af0893cd7e59 = $this->env->getExtension("native_profiler");
        $__internal_e44f5d17826e29b4b62bfc277d43e35ed7fac71685ecc9eab378af0893cd7e59->enter($__internal_e44f5d17826e29b4b62bfc277d43e35ed7fac71685ecc9eab378af0893cd7e59_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle::base.html.twig"));

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
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4fe151e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4fe151e_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/4fe151e_part_1_foundation.min_1.css");
            // line 8
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
            ";
            // asset "4fe151e_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4fe151e_1") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/4fe151e_part_1_normalize_2.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
            ";
        } else {
            // asset "4fe151e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4fe151e") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/4fe151e.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
            ";
        }
        unset($context["asset_url"]);
        // line 10
        echo "
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 14
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 20
        echo "    </body>
</html>
";
        
        $__internal_e44f5d17826e29b4b62bfc277d43e35ed7fac71685ecc9eab378af0893cd7e59->leave($__internal_e44f5d17826e29b4b62bfc277d43e35ed7fac71685ecc9eab378af0893cd7e59_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_017ec0af88a6f35e7d3a094bacf81be9ad5e20663d52abdf5e994f3d8f2f63e8 = $this->env->getExtension("native_profiler");
        $__internal_017ec0af88a6f35e7d3a094bacf81be9ad5e20663d52abdf5e994f3d8f2f63e8->enter($__internal_017ec0af88a6f35e7d3a094bacf81be9ad5e20663d52abdf5e994f3d8f2f63e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_017ec0af88a6f35e7d3a094bacf81be9ad5e20663d52abdf5e994f3d8f2f63e8->leave($__internal_017ec0af88a6f35e7d3a094bacf81be9ad5e20663d52abdf5e994f3d8f2f63e8_prof);

    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        $__internal_0b9174a150e677b1b1a2ceeda6346f8c71f0bd4484fd9487d18fc67d10cee16c = $this->env->getExtension("native_profiler");
        $__internal_0b9174a150e677b1b1a2ceeda6346f8c71f0bd4484fd9487d18fc67d10cee16c->enter($__internal_0b9174a150e677b1b1a2ceeda6346f8c71f0bd4484fd9487d18fc67d10cee16c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_0b9174a150e677b1b1a2ceeda6346f8c71f0bd4484fd9487d18fc67d10cee16c->leave($__internal_0b9174a150e677b1b1a2ceeda6346f8c71f0bd4484fd9487d18fc67d10cee16c_prof);

    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_7a13b102150e642e88682e48c553c690fa1c91b20440558a89d549e94ee16a74 = $this->env->getExtension("native_profiler");
        $__internal_7a13b102150e642e88682e48c553c690fa1c91b20440558a89d549e94ee16a74->enter($__internal_7a13b102150e642e88682e48c553c690fa1c91b20440558a89d549e94ee16a74_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 16
        echo "            ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "bb54fd1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bb54fd1_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/bb54fd1_part_1_foundation.min_1.js");
            // line 17
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
        } else {
            // asset "bb54fd1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_bb54fd1") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/bb54fd1.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
        }
        unset($context["asset_url"]);
        // line 19
        echo "        ";
        
        $__internal_7a13b102150e642e88682e48c553c690fa1c91b20440558a89d549e94ee16a74->leave($__internal_7a13b102150e642e88682e48c553c690fa1c91b20440558a89d549e94ee16a74_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 19,  117 => 17,  112 => 16,  106 => 15,  95 => 14,  83 => 5,  74 => 20,  71 => 15,  69 => 14,  63 => 11,  60 => 10,  40 => 8,  36 => 7,  31 => 5,  25 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/* */
/*             {% stylesheets '@AppBundle/Resources/public/css/*' %}*/
/*             <link rel="stylesheet" href="{{ asset_url }}" />*/
/*             {% endstylesheets %}*/
/* */
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}*/
/*             {% javascripts '@AppBundle/Resources/public/js/*' %}*/
/*             <script src="{{ asset_url }}"></script>*/
/*             {% endjavascripts %}*/
/*         {% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
