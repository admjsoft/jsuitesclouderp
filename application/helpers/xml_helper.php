<?php

 if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (! function_exists('xml_dom')) {
    function xml_dom()
    {
        return new DOMDocument('1.0');
    }
}


if (! function_exists('xml_add_child')) {
    function xml_add_child($parent, $name, $value = null, $cdata = false)
    {
        if ($parent->ownerDocument != "") {
            $dom = $parent->ownerDocument;
        } else {
            $dom = $parent;
        }

        $child = $dom->createElement($name);
        $parent->appendChild($child);

        if ($value != null) {
            if ($cdata) {
                $child->appendChild($dom->createCdataSection($value));
            } else {
                $child->appendChild($dom->createTextNode($value));
            }
        }

        return $child;
    }
}


if (! function_exists('xml_add_attribute')) {
    function xml_add_attribute($node, $name, $value = null)
    {
        $dom = $node->ownerDocument;

        $attribute = $dom->createAttribute($name);
        $node->appendChild($attribute);

        if ($value != null) {
            $attribute_value = $dom->createTextNode($value);
            $attribute->appendChild($attribute_value);
        }

        return $node;
    }
}


if (! function_exists('xml_print')) {
    function xml_print($dom, $return = false)
    {
        $dom->formatOutput = true;
        $xml = $dom->saveXML();
        if ($return) {
            return $xml;
        } else {
            echo html_entity_decode($xml);
        }
    }
}
