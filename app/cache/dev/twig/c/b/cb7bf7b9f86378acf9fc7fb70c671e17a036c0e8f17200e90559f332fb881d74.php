<?php

/* AppBundle:before:warning.html.twig */
class __TwigTemplate_f3bce21958a64815665e3228fc877bb0353d5e3bd434acc0223b8b007a499ffc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::base.html.twig", "AppBundle:before:warning.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0ca244c19e141c425860fb458ea2e96b75904f2ce069dcda52aacaa78f0ab9e6 = $this->env->getExtension("native_profiler");
        $__internal_0ca244c19e141c425860fb458ea2e96b75904f2ce069dcda52aacaa78f0ab9e6->enter($__internal_0ca244c19e141c425860fb458ea2e96b75904f2ce069dcda52aacaa78f0ab9e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:before:warning.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0ca244c19e141c425860fb458ea2e96b75904f2ce069dcda52aacaa78f0ab9e6->leave($__internal_0ca244c19e141c425860fb458ea2e96b75904f2ce069dcda52aacaa78f0ab9e6_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_9002b697ebf2359ae59c937a3acb8a062535de3e1e036b5a0f35417c32d34680 = $this->env->getExtension("native_profiler");
        $__internal_9002b697ebf2359ae59c937a3acb8a062535de3e1e036b5a0f35417c32d34680->enter($__internal_9002b697ebf2359ae59c937a3acb8a062535de3e1e036b5a0f35417c32d34680_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"row\"><br /></div>
    <div class=\"row\">
        <div class=\"large-6 columns large-offset-4 large-centered text-center\">
            <h3>Quiz się skończył. <br />Nie możesz brać powtórnie udziału w tym etapie.</h3>
        </div>
    </div>

";
        
        $__internal_9002b697ebf2359ae59c937a3acb8a062535de3e1e036b5a0f35417c32d34680->leave($__internal_9002b697ebf2359ae59c937a3acb8a062535de3e1e036b5a0f35417c32d34680_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:before:warning.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'AppBundle::base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="row"><br /></div>*/
/*     <div class="row">*/
/*         <div class="large-6 columns large-offset-4 large-centered text-center">*/
/*             <h3>Quiz się skończył. <br />Nie możesz brać powtórnie udziału w tym etapie.</h3>*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
/* */
