<?php

/* base.html.twig */
class __TwigTemplate_f2a2b3a215ba66666c4069ae876f4d97f85fb4cb5205fa44d637b912b81335fd extends Twig_Template
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
        $__internal_e2c94cfc392a327c89db5a63e49c16af72aaa86e3dd8f298fb51760b982c7085 = $this->env->getExtension("native_profiler");
        $__internal_e2c94cfc392a327c89db5a63e49c16af72aaa86e3dd8f298fb51760b982c7085->enter($__internal_e2c94cfc392a327c89db5a63e49c16af72aaa86e3dd8f298fb51760b982c7085_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_e2c94cfc392a327c89db5a63e49c16af72aaa86e3dd8f298fb51760b982c7085->leave($__internal_e2c94cfc392a327c89db5a63e49c16af72aaa86e3dd8f298fb51760b982c7085_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_397eea5382c4343afd360db97239899ddba272878e62e9ed849f50dfbe14bf12 = $this->env->getExtension("native_profiler");
        $__internal_397eea5382c4343afd360db97239899ddba272878e62e9ed849f50dfbe14bf12->enter($__internal_397eea5382c4343afd360db97239899ddba272878e62e9ed849f50dfbe14bf12_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_397eea5382c4343afd360db97239899ddba272878e62e9ed849f50dfbe14bf12->leave($__internal_397eea5382c4343afd360db97239899ddba272878e62e9ed849f50dfbe14bf12_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_7265743975c266037ec7a36fa28ea5c018028f9c787e01e28f0d1101090d98fe = $this->env->getExtension("native_profiler");
        $__internal_7265743975c266037ec7a36fa28ea5c018028f9c787e01e28f0d1101090d98fe->enter($__internal_7265743975c266037ec7a36fa28ea5c018028f9c787e01e28f0d1101090d98fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_7265743975c266037ec7a36fa28ea5c018028f9c787e01e28f0d1101090d98fe->leave($__internal_7265743975c266037ec7a36fa28ea5c018028f9c787e01e28f0d1101090d98fe_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_319f04e0e6a9739a0d448edc1aff93208e0ad8e77c76b7bc39eef56cf01904a2 = $this->env->getExtension("native_profiler");
        $__internal_319f04e0e6a9739a0d448edc1aff93208e0ad8e77c76b7bc39eef56cf01904a2->enter($__internal_319f04e0e6a9739a0d448edc1aff93208e0ad8e77c76b7bc39eef56cf01904a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319f04e0e6a9739a0d448edc1aff93208e0ad8e77c76b7bc39eef56cf01904a2->leave($__internal_319f04e0e6a9739a0d448edc1aff93208e0ad8e77c76b7bc39eef56cf01904a2_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_2c949f44959d13524e3da770828fcf5cc89d68b0f3d9d0ce07e25067e129d4ff = $this->env->getExtension("native_profiler");
        $__internal_2c949f44959d13524e3da770828fcf5cc89d68b0f3d9d0ce07e25067e129d4ff->enter($__internal_2c949f44959d13524e3da770828fcf5cc89d68b0f3d9d0ce07e25067e129d4ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_2c949f44959d13524e3da770828fcf5cc89d68b0f3d9d0ce07e25067e129d4ff->leave($__internal_2c949f44959d13524e3da770828fcf5cc89d68b0f3d9d0ce07e25067e129d4ff_prof);

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
