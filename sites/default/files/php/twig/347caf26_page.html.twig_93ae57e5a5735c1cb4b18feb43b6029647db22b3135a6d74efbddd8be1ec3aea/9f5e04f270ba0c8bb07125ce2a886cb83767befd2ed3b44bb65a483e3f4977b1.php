<?php

/* themes/custom/stitched/templates/page.html.twig */
class __TwigTemplate_0ed92db0738b0248fb07c296a2f7328f6dd44935c114b458edacb785f52ef2fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 51);
        $filters = array("t" => 44);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array('t'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateName($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 42
        echo "<div id=\"page-wrapper\">
    <div id=\"page\">
        <header id=\"header\" class=\"header\" role=\"banner\" aria-label=\"";
        // line 44
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Site header")));
        echo "\">
            <div class=\"section layout-container clearfix\">
                ";
        // line 46
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array()), "html", null, true));
        echo "
                ";
        // line 47
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
        echo "
                ";
        // line 48
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu", array()), "html", null, true));
        echo "
            </div>
        </header>
        ";
        // line 51
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured", array())) {
            // line 52
            echo "            <div class=\"featured\">
                <aside class=\"featured__inner section layout-container clearfix\" role=\"complementary\">
                    ";
            // line 54
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "featured", array()), "html", null, true));
            echo "
                </aside>
            </div>
        ";
        }
        // line 58
        echo "        <div id=\"main-wrapper\" class=\"layout-main-wrapper layout-container clearfix\">
            <div id=\"main\" class=\"layout-main clearfix\">
                <main id=\"content\" class=\"column main-content\" role=\"main\">
                    <section class=\"section\">
                        <a id=\"main-content\" tabindex=\"-1\"></a>
                        ";
        // line 63
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
                    </section>
                </main>
                ";
        // line 66
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) {
            // line 67
            echo "                    <div id=\"sidebar-first\" class=\"column sidebar\">
                        <aside class=\"section\" role=\"complementary\">
                            ";
            // line 69
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()), "html", null, true));
            echo "
                        </aside>
                    </div>
                ";
        }
        // line 73
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array())) {
            // line 74
            echo "                    <div id=\"sidebar-second\" class=\"column sidebar\">
                        <aside class=\"section\" role=\"complementary\">
                            ";
            // line 76
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array()), "html", null, true));
            echo "
                        </aside>
                    </div>
                ";
        }
        // line 80
        echo "            </div>
        </div>
        <footer class=\"site-footer\">
            <div class=\"layout-container\">
                ";
        // line 84
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array())) {
            // line 85
            echo "                    <div class=\"site-footer__top clearfix\">
                        ";
            // line 86
            if (((isset($context["stitched_discount"]) ? $context["stitched_discount"] : null) == "yes")) {
                // line 87
                echo "                            <div>Your discount code is 1234567890</div>
                        ";
            }
            // line 89
            echo "                        ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
            echo "
                    </div>
                ";
        }
        // line 92
        echo "            </div>
        </footer>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/stitched/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 92,  136 => 89,  132 => 87,  130 => 86,  127 => 85,  125 => 84,  119 => 80,  112 => 76,  108 => 74,  105 => 73,  98 => 69,  94 => 67,  92 => 66,  86 => 63,  79 => 58,  72 => 54,  68 => 52,  66 => 51,  60 => 48,  56 => 47,  52 => 46,  47 => 44,  43 => 42,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/stitched/templates/page.html.twig", "/var/www/drupal8.local/themes/custom/stitched/templates/page.html.twig");
    }
}
