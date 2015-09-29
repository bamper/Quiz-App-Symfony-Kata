<?php

/* AppBundle:before:timer.html.twig */
class __TwigTemplate_666e08083c392737938f8f9ed7101990205798cbf0c9938262dd93feb709e965 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AppBundle::base.html.twig", "AppBundle:before:timer.html.twig", 1);
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
        $__internal_52a9b2280300c5f3a5a9ba35cba99218636bd614b111c9e63bffd3fb3d3b909a = $this->env->getExtension("native_profiler");
        $__internal_52a9b2280300c5f3a5a9ba35cba99218636bd614b111c9e63bffd3fb3d3b909a->enter($__internal_52a9b2280300c5f3a5a9ba35cba99218636bd614b111c9e63bffd3fb3d3b909a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:before:timer.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_52a9b2280300c5f3a5a9ba35cba99218636bd614b111c9e63bffd3fb3d3b909a->leave($__internal_52a9b2280300c5f3a5a9ba35cba99218636bd614b111c9e63bffd3fb3d3b909a_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_5604a60dfffc428da342304da5cd4e957b24a77bf4235cfa5d6e2cb71dbac61e = $this->env->getExtension("native_profiler");
        $__internal_5604a60dfffc428da342304da5cd4e957b24a77bf4235cfa5d6e2cb71dbac61e->enter($__internal_5604a60dfffc428da342304da5cd4e957b24a77bf4235cfa5d6e2cb71dbac61e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"row\"><br /></div>
    <div class=\"row\">
        <div class=\"large-4 columns large-offset-4 large-centered text-center\">
            <h3>Quiz się skończył.</h3>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"large-4 columns large-offset-4 large-centered text-center\">
            ";
        // line 13
        if (((isset($context["isSetPrepared"]) ? $context["isSetPrepared"] : $this->getContext($context, "isSetPrepared")) == true)) {
            // line 14
            echo "                <h3>Następny etap:</h3>
                <h2>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["next_start_date"]) ? $context["next_start_date"] : $this->getContext($context, "next_start_date")), "format", array(0 => "Y-m-d H:i:s"), "method"), "html", null, true);
            echo "</h2>
            ";
        } else {
            // line 17
            echo "                <h3>W tej chwili następny etap nie jest wyznaczony.</h3>
            ";
        }
        // line 19
        echo "        </div>
    </div>
";
        
        $__internal_5604a60dfffc428da342304da5cd4e957b24a77bf4235cfa5d6e2cb71dbac61e->leave($__internal_5604a60dfffc428da342304da5cd4e957b24a77bf4235cfa5d6e2cb71dbac61e_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:before:timer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 19,  61 => 17,  56 => 15,  53 => 14,  51 => 13,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'AppBundle::base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="row"><br /></div>*/
/*     <div class="row">*/
/*         <div class="large-4 columns large-offset-4 large-centered text-center">*/
/*             <h3>Quiz się skończył.</h3>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <div class="row">*/
/*         <div class="large-4 columns large-offset-4 large-centered text-center">*/
/*             {% if isSetPrepared == true %}*/
/*                 <h3>Następny etap:</h3>*/
/*                 <h2>{{ next_start_date.format('Y-m-d H:i:s') }}</h2>*/
/*             {% else %}*/
/*                 <h3>W tej chwili następny etap nie jest wyznaczony.</h3>*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* */
