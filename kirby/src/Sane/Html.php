<?php

namespace Kirby\Sane;

/**
 * Sane handler for HTML files
 * @since 3.6.0
 *
 * @package   Kirby Sane
 * @author    Bastian Allgeier <bastian@getkirby.com>,
 *            Lukas Bestle <lukas@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier GmbH
 * @license   https://opensource.org/licenses/MIT
 */
class Html extends DomHandler
{
    /**
     * Global list of allowed attribute prefixes
     *
     * @var array
     */
    public static $allowedAttrPrefixes = [
        'aria-',
        'data-',
    ];

    /**
     * Global list of allowed attributes
     *
     * @var array
     */
    public static $allowedAttrs = [
        'class',
        'id',
    ];

    /**
     * Allowed hostnames for HTTP(S) URLs
     *
     * @var array
     */
    public static $allowedDomains = true;

    /**
     * Associative array of all allowed tag names with the value
     * of either an array with the list of all allowed attributes
     * for this tag, `true` to allow any attribute from the
     * `allowedAttrs` list or `false` to allow the tag without
     * any attributes
     *
     * @var array
     */
    public static $allowedTags = [
        'a'          => ['href', 'rel', 'title', 'target'],
        'abbr'       => ['title'],
        'b'          => true,
        'body'       => true,
        'blockquote' => true,
        'br'         => true,
        'code'       => true,
        'dl'         => true,
        'dd'         => true,
        'del'        => true,
        'div'        => true,
        'dt'         => true,
        'em'         => true,
        'footer'     => true,
        'h1'         => true,
        'h2'         => true,
        'h3'         => true,
        'h4'         => true,
        'h5'         => true,
        'h6'         => true,
        'hr'         => true,
        'html'       => true,
        'i'          => true,
        'ins'        => true,
        'li'         => true,
        'span'       => true,
        'strong'     => true,
        'sub'        => true,
        'sup'        => true,
        'ol'         => true,
        'p'          => true,
        'pre'        => true,
        'u'          => true,
        'ul'         => true,
    ];

    /**
     * Array of explicitly disallowed tags
     *
     * IMPORTANT: Use lower-case names here because
     * of the case-insensitive matching
     *
     * @var array
     */
    public static $disallowedTags = [
        'iframe',
        'meta',
        'object',
        'script',
        'style',
    ];

    /**
     * List of attributes that may contain URLs
     *
     * @var array
     */
    public static $urlAttrs = [
        'href',
        'src',
        'xlink:href',
    ];

    /**
     * The document type (`'HTML'` or `'XML'`)
     *
     * @var string
     */
    protected static $type = 'HTML';

    /**
     * Returns the sanitization options for the handler
     *
     * @return array
     */
    protected static function options(): array
    {
        return array_merge(parent::options(), [
            'allowedAttrPrefixes' => static::$allowedAttrPrefixes,
            'allowedAttrs'        => static::$allowedAttrs,
            'allowedNamespaces'   => [],
            'allowedPIs'          => [],
            'allowedTags'         => static::$allowedTags,
            'disallowedTags'      => static::$disallowedTags,
            'urlAttrs'            => static::$urlAttrs,
        ]);
    }
}
