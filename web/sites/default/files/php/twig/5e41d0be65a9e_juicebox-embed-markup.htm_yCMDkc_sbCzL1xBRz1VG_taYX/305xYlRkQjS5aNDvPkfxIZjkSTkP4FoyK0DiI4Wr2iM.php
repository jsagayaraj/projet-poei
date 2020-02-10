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

/* modules/contrib/juicebox/templates/juicebox-embed-markup.html.twig */
class __TwigTemplate_9da6a0791c67fc45a62dfafb478598077dd70008147d8b18b6611740a32ea276 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 23, "for" => 29];
        $filters = ["escape" => 18];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape'],
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
        // line 18
        echo "<div";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
        echo ">
  ";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null)), "html", null, true);
        echo "
  <div id=\"";
        // line 20
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["gallery_id"] ?? null)), "html", null, true);
        echo "\" class=\"juicebox-container\">
    <noscript>
      <!-- Image gallery content for non-javascript devices -->
      ";
        // line 23
        if ($this->getAttribute(($context["gallery_options"] ?? null), "gallerytitle", [], "any", true, true)) {
            // line 24
            echo "      <h1 class=\"jb-name\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["gallery_options"] ?? null), "gallerytitle", [])), "html", null, true);
            echo "</h1>
      ";
        }
        // line 26
        echo "      ";
        if ($this->getAttribute(($context["gallery_options"] ?? null), "gallerydescription", [], "any", true, true)) {
            // line 27
            echo "      <p class=\"jb-description\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["gallery_options"] ?? null), "gallerydescription", [])), "html", null, true);
            echo "</p>
      ";
        }
        // line 29
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["gallery_images"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 30
            echo "      <p class=\"jb-image\">
        ";
            // line 31
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "image_plain", [])), "html", null, true);
            echo "<br/>
        <span class=\"jb-title\">";
            // line 32
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "title", [])), "html", null, true);
            echo "</span><br/>
        <span class=\"jb-caption\">";
            // line 33
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["image"], "caption", [])), "html", null, true);
            echo "</span>
      </p>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </noscript>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/juicebox/templates/juicebox-embed-markup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 36,  103 => 33,  99 => 32,  95 => 31,  92 => 30,  87 => 29,  81 => 27,  78 => 26,  72 => 24,  70 => 23,  64 => 20,  60 => 19,  55 => 18,);
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
 * Default theme implementation to display the embed code for a Juicebox
 * gallery.
 *
 * Available variables:
 * - gallery_id: The unique identifier for this gallery.
 * - gallery_images: Image data for all the images in the gallery.
 * - gallery_options: Options to be passed to the Juicebox javascript library
 *   for this gallery.
 * - attributes: Any overall attributes for the parent wrapper.
 * - title_suffix: Title suffix data as typically provided by contextual links.
 *
 * @ingroup themeable
 */
#}
<div{{ attributes }}>
  {{ title_suffix }}
  <div id=\"{{ gallery_id }}\" class=\"juicebox-container\">
    <noscript>
      <!-- Image gallery content for non-javascript devices -->
      {% if gallery_options.gallerytitle is defined %}
      <h1 class=\"jb-name\">{{ gallery_options.gallerytitle}}</h1>
      {% endif %}
      {% if gallery_options.gallerydescription is defined %}
      <p class=\"jb-description\">{{ gallery_options.gallerydescription}}</p>
      {% endif %}
      {% for image in gallery_images %}
      <p class=\"jb-image\">
        {{ image.image_plain }}<br/>
        <span class=\"jb-title\">{{ image.title }}</span><br/>
        <span class=\"jb-caption\">{{ image.caption }}</span>
      </p>
      {% endfor %}
    </noscript>
  </div>
</div>
", "modules/contrib/juicebox/templates/juicebox-embed-markup.html.twig", "C:\\xampp\\htdocs\\drupal-8\\projet-poei\\web\\modules\\contrib\\juicebox\\templates\\juicebox-embed-markup.html.twig");
    }
}
