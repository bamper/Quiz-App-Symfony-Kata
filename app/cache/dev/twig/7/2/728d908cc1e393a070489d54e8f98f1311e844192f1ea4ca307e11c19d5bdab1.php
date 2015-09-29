<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_786929c350ca3138c923990b20f4870011109b9ff0b78661ea39c32ccba19a15 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2d686b11a698f8f14d1a18dc134ccd8c4cadfeb76a27ec124b7f2cfe38bd7eca = $this->env->getExtension("native_profiler");
        $__internal_2d686b11a698f8f14d1a18dc134ccd8c4cadfeb76a27ec124b7f2cfe38bd7eca->enter($__internal_2d686b11a698f8f14d1a18dc134ccd8c4cadfeb76a27ec124b7f2cfe38bd7eca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2d686b11a698f8f14d1a18dc134ccd8c4cadfeb76a27ec124b7f2cfe38bd7eca->leave($__internal_2d686b11a698f8f14d1a18dc134ccd8c4cadfeb76a27ec124b7f2cfe38bd7eca_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_81efebde27e99774ea7d6a9fb4dd3546dfbbbccb875c3ef036e025a063702c1e = $this->env->getExtension("native_profiler");
        $__internal_81efebde27e99774ea7d6a9fb4dd3546dfbbbccb875c3ef036e025a063702c1e->enter($__internal_81efebde27e99774ea7d6a9fb4dd3546dfbbbccb875c3ef036e025a063702c1e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_81efebde27e99774ea7d6a9fb4dd3546dfbbbccb875c3ef036e025a063702c1e->leave($__internal_81efebde27e99774ea7d6a9fb4dd3546dfbbbccb875c3ef036e025a063702c1e_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_55e669d064838a1b92a45ff9f21f20532ca12e4a2bd95ca643ae2000a8db3fab = $this->env->getExtension("native_profiler");
        $__internal_55e669d064838a1b92a45ff9f21f20532ca12e4a2bd95ca643ae2000a8db3fab->enter($__internal_55e669d064838a1b92a45ff9f21f20532ca12e4a2bd95ca643ae2000a8db3fab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_55e669d064838a1b92a45ff9f21f20532ca12e4a2bd95ca643ae2000a8db3fab->leave($__internal_55e669d064838a1b92a45ff9f21f20532ca12e4a2bd95ca643ae2000a8db3fab_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_7e000390d730c1f8714a73d2f28904d146e9cbb2ce2e8dfed99e79063b577cde = $this->env->getExtension("native_profiler");
        $__internal_7e000390d730c1f8714a73d2f28904d146e9cbb2ce2e8dfed99e79063b577cde->enter($__internal_7e000390d730c1f8714a73d2f28904d146e9cbb2ce2e8dfed99e79063b577cde_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_7e000390d730c1f8714a73d2f28904d146e9cbb2ce2e8dfed99e79063b577cde->leave($__internal_7e000390d730c1f8714a73d2f28904d146e9cbb2ce2e8dfed99e79063b577cde_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'TwigBundle::layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include 'TwigBundle:Exception:exception.html.twig' %}*/
/* {% endblock %}*/
/* */
