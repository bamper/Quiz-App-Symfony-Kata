<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_80d04abdcbec303a377c52612c235f2bdaaff43ceb1e6aab9654b72b650421d8 extends Twig_Template
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
        $__internal_8ea0a369cfb7964c12bebe11183d2d69d0fb4c56cb698e373fff68e8f77e8e63 = $this->env->getExtension("native_profiler");
        $__internal_8ea0a369cfb7964c12bebe11183d2d69d0fb4c56cb698e373fff68e8f77e8e63->enter($__internal_8ea0a369cfb7964c12bebe11183d2d69d0fb4c56cb698e373fff68e8f77e8e63_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8ea0a369cfb7964c12bebe11183d2d69d0fb4c56cb698e373fff68e8f77e8e63->leave($__internal_8ea0a369cfb7964c12bebe11183d2d69d0fb4c56cb698e373fff68e8f77e8e63_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_1a1c04fe24ed89413004f4332be983bd851789e780f0582c597f9b3b08f7e6f1 = $this->env->getExtension("native_profiler");
        $__internal_1a1c04fe24ed89413004f4332be983bd851789e780f0582c597f9b3b08f7e6f1->enter($__internal_1a1c04fe24ed89413004f4332be983bd851789e780f0582c597f9b3b08f7e6f1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_1a1c04fe24ed89413004f4332be983bd851789e780f0582c597f9b3b08f7e6f1->leave($__internal_1a1c04fe24ed89413004f4332be983bd851789e780f0582c597f9b3b08f7e6f1_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_1884ad4600f498324fc6154122234ef88f8b69f6051e70fef66e087c59dea27a = $this->env->getExtension("native_profiler");
        $__internal_1884ad4600f498324fc6154122234ef88f8b69f6051e70fef66e087c59dea27a->enter($__internal_1884ad4600f498324fc6154122234ef88f8b69f6051e70fef66e087c59dea27a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_1884ad4600f498324fc6154122234ef88f8b69f6051e70fef66e087c59dea27a->leave($__internal_1884ad4600f498324fc6154122234ef88f8b69f6051e70fef66e087c59dea27a_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_92031c9d635731db2cc3581c8bf53065b5d88b06eaaf670f1d7d90211e04829c = $this->env->getExtension("native_profiler");
        $__internal_92031c9d635731db2cc3581c8bf53065b5d88b06eaaf670f1d7d90211e04829c->enter($__internal_92031c9d635731db2cc3581c8bf53065b5d88b06eaaf670f1d7d90211e04829c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_92031c9d635731db2cc3581c8bf53065b5d88b06eaaf670f1d7d90211e04829c->leave($__internal_92031c9d635731db2cc3581c8bf53065b5d88b06eaaf670f1d7d90211e04829c_prof);

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
