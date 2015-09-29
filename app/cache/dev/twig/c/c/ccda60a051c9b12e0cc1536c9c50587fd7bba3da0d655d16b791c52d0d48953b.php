<?php

/* AppBundle:before:index.html.twig */
class __TwigTemplate_50c013e2f105156fcfe0a131f3d8c643310ace0dfa0813c1b5f0a589396a3be1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::base.html.twig", "AppBundle:before:index.html.twig", 1);
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
        $__internal_2a140634d9f270284d8ae32100d3571b32f09603a60b05d1a9f6cbd6c81a432f = $this->env->getExtension("native_profiler");
        $__internal_2a140634d9f270284d8ae32100d3571b32f09603a60b05d1a9f6cbd6c81a432f->enter($__internal_2a140634d9f270284d8ae32100d3571b32f09603a60b05d1a9f6cbd6c81a432f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:before:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2a140634d9f270284d8ae32100d3571b32f09603a60b05d1a9f6cbd6c81a432f->leave($__internal_2a140634d9f270284d8ae32100d3571b32f09603a60b05d1a9f6cbd6c81a432f_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_b05f8a164e815b807ea7050dc3e3befaad81c46f399b8a5bcbb919a6487c57da = $this->env->getExtension("native_profiler");
        $__internal_b05f8a164e815b807ea7050dc3e3befaad81c46f399b8a5bcbb919a6487c57da->enter($__internal_b05f8a164e815b807ea7050dc3e3befaad81c46f399b8a5bcbb919a6487c57da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"row\"><br /></div>
    <div class=\"row\">
        <div class=\"large-4 columns large-offset-4 large-centered text-center\">
            <p>Przygotuj się. Czas jest liczony od wyświetlenia strony.</p>
        </div>
    </div>
    <div class=\"row\">

        <div class=\"large-4 columns large-offset-4 large-centered text-center\">
            <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("quizpage");
        echo "\" class=\"button\">Start</a>
        </div>
    </div>
";
        
        $__internal_b05f8a164e815b807ea7050dc3e3befaad81c46f399b8a5bcbb919a6487c57da->leave($__internal_b05f8a164e815b807ea7050dc3e3befaad81c46f399b8a5bcbb919a6487c57da_prof);

    }

    // line 18
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_c43ee5b573aa6c61527553bc5617edc1313c416c56513ea34a57723e62481e42 = $this->env->getExtension("native_profiler");
        $__internal_c43ee5b573aa6c61527553bc5617edc1313c416c56513ea34a57723e62481e42->enter($__internal_c43ee5b573aa6c61527553bc5617edc1313c416c56513ea34a57723e62481e42_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 19
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
        
        $__internal_c43ee5b573aa6c61527553bc5617edc1313c416c56513ea34a57723e62481e42->leave($__internal_c43ee5b573aa6c61527553bc5617edc1313c416c56513ea34a57723e62481e42_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:before:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 19,  63 => 18,  52 => 13,  41 => 4,  35 => 3,  11 => 1,);
    }
}
/* {% extends 'AppBundle::base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="row"><br /></div>*/
/*     <div class="row">*/
/*         <div class="large-4 columns large-offset-4 large-centered text-center">*/
/*             <p>Przygotuj się. Czas jest liczony od wyświetlenia strony.</p>*/
/*         </div>*/
/*     </div>*/
/*     <div class="row">*/
/* */
/*         <div class="large-4 columns large-offset-4 large-centered text-center">*/
/*             <a href="{{ path('quizpage') }}" class="button">Start</a>*/
/*         </div>*/
/*     </div>*/
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
