<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/bootstrap_barrio_subtheme/templates/footer/region--footer-second.html.twig */
class __TwigTemplate_ffa48be4200e1e5a0e4d6995a781a3543f9a091032229d290492bb995fcd0a4f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 16, "if" => 22];
        $filters = ["clean_class" => 18, "escape" => 23];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 16
        $context["classes"] = [0 => "region", 1 => ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 18
($context["region"] ?? null)))), 2 => "col-md-3"];
        // line 22
        if (($context["content"] ?? null)) {
            // line 23
            echo "  <section ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
            echo ">
    <div>
      ";
            // line 25
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null)), "html", null, true);
            echo "
      <a href=\"https://www.facebook.com\" target=\"_blank\"><i class=\"fab fa-facebook-square fa-2x\"></i></a>
      <a href=\"https://twitter.com/\" target=\"_blank\"><i class=\"fab fa-twitter-square fa-2x\"></i></a>
     
    </div>


  </section>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/bootstrap_barrio_subtheme/templates/footer/region--footer-second.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 25,  60 => 23,  58 => 22,  56 => 18,  55 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a region.
 *
 * Available variables:
 * - content: The content for this region, typically blocks.
 * - attributes: HTML attributes for the region div.
 * - region: The name of the region variable as defined in the theme's
 *   .info.yml file.
 *
 * @see template_preprocess_region()
 */
#}
{%
  set classes = [
    'region',
    'region-' ~ region|clean_class,
    'col-md-3'
  ]
%}
{% if content %}
  <section {{ attributes.addClass(classes) }}>
    <div>
      {{ content }}
      <a href=\"https://www.facebook.com\" target=\"_blank\"><i class=\"fab fa-facebook-square fa-2x\"></i></a>
      <a href=\"https://twitter.com/\" target=\"_blank\"><i class=\"fab fa-twitter-square fa-2x\"></i></a>
     
    </div>


  </section>
{% endif %}
", "themes/custom/bootstrap_barrio_subtheme/templates/footer/region--footer-second.html.twig", "C:\\xampp\\htdocs\\drupal-8\\projet-poei\\web\\themes\\custom\\bootstrap_barrio_subtheme\\templates\\footer\\region--footer-second.html.twig");
    }
}