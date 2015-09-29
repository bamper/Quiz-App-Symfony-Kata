<?php

/* AppBundle:begin:index.html.twig */
class __TwigTemplate_b5a25ad2872584c28244f33d57580754eb49b2217f3111f422eb50c86751a1eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::base.html.twig", "AppBundle:begin:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bd9f6e3fcafebfcdc86efe741c651c84f3746ae8fbe93e1c5f7d39cf3aa02e5e = $this->env->getExtension("native_profiler");
        $__internal_bd9f6e3fcafebfcdc86efe741c651c84f3746ae8fbe93e1c5f7d39cf3aa02e5e->enter($__internal_bd9f6e3fcafebfcdc86efe741c651c84f3746ae8fbe93e1c5f7d39cf3aa02e5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:begin:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bd9f6e3fcafebfcdc86efe741c651c84f3746ae8fbe93e1c5f7d39cf3aa02e5e->leave($__internal_bd9f6e3fcafebfcdc86efe741c651c84f3746ae8fbe93e1c5f7d39cf3aa02e5e_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_77ad02c9e2200a1a3b918e9b7e53354f6ba193e7cea561de72744b0ad3b26476 = $this->env->getExtension("native_profiler");
        $__internal_77ad02c9e2200a1a3b918e9b7e53354f6ba193e7cea561de72744b0ad3b26476->enter($__internal_77ad02c9e2200a1a3b918e9b7e53354f6ba193e7cea561de72744b0ad3b26476_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"row\"><br /></div>
    <div class=\"row\">
        <div class=\"large-4 columns large-offset-4 large-centered text-center\">
            <p>Witamy. Użyj adresu email na który otrzymałes wiadomość oraz hasła w niej zawartego by kontynuować.</p>
        </div>
    </div>
    <div class=\"row\">

        <div class=\"large-4 columns large-offset-4 large-centered text-center\">
            ";
        // line 13
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
            ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            ";
        // line 15
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

        </div>

    </div>


";
        
        $__internal_77ad02c9e2200a1a3b918e9b7e53354f6ba193e7cea561de72744b0ad3b26476->leave($__internal_77ad02c9e2200a1a3b918e9b7e53354f6ba193e7cea561de72744b0ad3b26476_prof);

    }

    // line 24
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_54a2b642bfdbd108748c4cf9b7f96983464f8c67f392d5172c8c25441a6425be = $this->env->getExtension("native_profiler");
        $__internal_54a2b642bfdbd108748c4cf9b7f96983464f8c67f392d5172c8c25441a6425be->enter($__internal_54a2b642bfdbd108748c4cf9b7f96983464f8c67f392d5172c8c25441a6425be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 25
        echo "<style>
    body { background: #F5F5F5; font: 18px/1.5 sans-serif; }
    h1, h2 { line-height: 1.2; margin: 0 0 .5em; }
    h1 { font-size: 36px; }
    h2 { font-size: 21px; margin-bottom: 1em; }
    p { margin: 0 0 1em 0; }
    a { color: #0000F0; }
    a:hover { text-decoration: none; }
    code { background: #F5F5F5; max-width: 100px; padding: 2px 6px; word-wrap: break-word; }
    #wrapper { background: #FFF; margin: 1em auto; max-width: 800px; width: 95%; }
    #container { padding: 2em; }
    #welcome, #status { margin-bottom: 2em; }
    #welcome h1 span { display: block; font-size: 75%; }
    #icon-status, #icon-book { float: left; height: 64px; margin-right: 1em; margin-top: -4px; width: 64px; }
    #icon-book { display: none; }

    @media (min-width: 768px) {
        #wrapper { width: 80%; margin: 2em auto; }
        #icon-book { display: inline-block; }
        #status a, #next a { display: block; }

        @-webkit-keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }
        @keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }
        .sf-toolbar { opacity: 0; -webkit-animation: fade-in 1s .2s forwards; animation: fade-in 1s .2s forwards;}
    }
</style>
";
        
        $__internal_54a2b642bfdbd108748c4cf9b7f96983464f8c67f392d5172c8c25441a6425be->leave($__internal_54a2b642bfdbd108748c4cf9b7f96983464f8c67f392d5172c8c25441a6425be_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:begin:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 25,  75 => 24,  60 => 15,  56 => 14,  52 => 13,  41 => 4,  35 => 3,  11 => 1,);
    }
}
/* {% extends 'AppBundle::base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="row"><br /></div>*/
/*     <div class="row">*/
/*         <div class="large-4 columns large-offset-4 large-centered text-center">*/
/*             <p>Witamy. Użyj adresu email na który otrzymałes wiadomość oraz hasła w niej zawartego by kontynuować.</p>*/
/*         </div>*/
/*     </div>*/
/*     <div class="row">*/
/* */
/*         <div class="large-4 columns large-offset-4 large-centered text-center">*/
/*             {{ form_start(form) }}*/
/*             {{ form_widget(form) }}*/
/*             {{ form_end(form) }}*/
/* */
/*         </div>*/
/* */
/*     </div>*/
/* */
/* */
/* {% endblock %}*/
/* */
/* {% block stylesheets %}*/
/* <style>*/
/*     body { background: #F5F5F5; font: 18px/1.5 sans-serif; }*/
/*     h1, h2 { line-height: 1.2; margin: 0 0 .5em; }*/
/*     h1 { font-size: 36px; }*/
/*     h2 { font-size: 21px; margin-bottom: 1em; }*/
/*     p { margin: 0 0 1em 0; }*/
/*     a { color: #0000F0; }*/
/*     a:hover { text-decoration: none; }*/
/*     code { background: #F5F5F5; max-width: 100px; padding: 2px 6px; word-wrap: break-word; }*/
/*     #wrapper { background: #FFF; margin: 1em auto; max-width: 800px; width: 95%; }*/
/*     #container { padding: 2em; }*/
/*     #welcome, #status { margin-bottom: 2em; }*/
/*     #welcome h1 span { display: block; font-size: 75%; }*/
/*     #icon-status, #icon-book { float: left; height: 64px; margin-right: 1em; margin-top: -4px; width: 64px; }*/
/*     #icon-book { display: none; }*/
/* */
/*     @media (min-width: 768px) {*/
/*         #wrapper { width: 80%; margin: 2em auto; }*/
/*         #icon-book { display: inline-block; }*/
/*         #status a, #next a { display: block; }*/
/* */
/*         @-webkit-keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }*/
/*         @keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }*/
/*         .sf-toolbar { opacity: 0; -webkit-animation: fade-in 1s .2s forwards; animation: fade-in 1s .2s forwards;}*/
/*     }*/
/* </style>*/
/* {% endblock %}*/
/* */
