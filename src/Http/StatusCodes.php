<?php
/**
 * @file ATTENTION!!! The code below was carefully crafted by a mean machine.
 * Please consider to NOT put any emotional human-generated modifications as the splendid AI will throw them away with no mercy.
 */

namespace Swaggest\SwaggerHttp;

use Exception;


class StatusCodes
{
    /**
     * indicates that the initial part of a request has been received and has not
     * yet been rejected by the server.
     * @see [RFC7231#6.2.1](https://tools.ietf.org/html/rfc7231#section-6.2.1)
     */
    const _CONTINUE = 100;

    /**
     * indicates that the server understands and is willing to comply with the
     * client's request, via the Upgrade header field, for a change in the
     * application protocol being used on this connection.
     * @see [RFC7231#6.2.2](https://tools.ietf.org/html/rfc7231#section-6.2.2)
     */
    const SWITCHING_PROTOCOLS = 101;

    /**
     * indicates that the request has succeeded.
     * @see [RFC7231#6.3.1](https://tools.ietf.org/html/rfc7231#section-6.3.1)
     */
    const OK = 200;

    /**
     * indicates that the request has been fulfilled and has resulted in one or
     * more new resources being created.
     * @see [RFC7231#6.3.2](https://tools.ietf.org/html/rfc7231#section-6.3.2)
     */
    const CREATED = 201;

    /**
     * indicates that the request has been accepted for processing, but the
     * processing has not been completed.
     * @see [RFC7231#6.3.3](https://tools.ietf.org/html/rfc7231#section-6.3.3)
     */
    const ACCEPTED = 202;

    /**
     * indicates that the request was successful but the enclosed payload has been
     * modified from that of the origin server's 200 (OK) response by a
     * transforming proxy.
     * @see [RFC7231#6.3.4](https://tools.ietf.org/html/rfc7231#section-6.3.4)
     */
    const NON_AUTHORITATIVE_INFORMATION = 203;

    /**
     * indicates that the server has successfully fulfilled the request and that
     * there is no additional content to send in the response payload body.
     * @see [RFC7231#6.3.5](https://tools.ietf.org/html/rfc7231#section-6.3.5)
     */
    const NO_CONTENT = 204;

    /**
     * indicates that the server has fulfilled the request and desires that the
     * user agent reset the "document view", which caused the request to be sent,
     * to its original state as received from the origin server.
     * @see [RFC7231#6.3.6](https://tools.ietf.org/html/rfc7231#section-6.3.6)
     */
    const RESET_CONTENT = 205;

    /**
     * indicates that the server is successfully fulfilling a range request for
     * the target resource by transferring one or more parts of the selected
     * representation that correspond to the satisfiable ranges found in the
     * requests's Range header field.
     * @see [RFC7233#4.1](https://tools.ietf.org/html/rfc7233#section-4.1)
     */
    const PARTIAL_CONTENT = 206;

    /**
     * indicates that the target resource has more than one representation, each
     * with its own more specific identifier, and information about the
     * alternatives is being provided so that the user (or user agent) can select
     * a preferred representation by redirecting its request to one or more of
     * those identifiers.
     * @see [RFC7231#6.4.1](https://tools.ietf.org/html/rfc7231#section-6.4.1)
     */
    const MULTIPLE_CHOICES = 300;

    /**
     * indicates that the target resource has been assigned a new permanent URI
     * and any future references to this resource ought to use one of the enclosed
     * URIs.
     * @see [RFC7231#6.4.2](https://tools.ietf.org/html/rfc7231#section-6.4.2)
     */
    const MOVED_PERMANENTLY = 301;

    /**
     * indicates that the target resource resides temporarily under a different
     * URI.
     * @see [RFC7231#6.4.3](https://tools.ietf.org/html/rfc7231#section-6.4.3)
     */
    const FOUND = 302;

    /**
     * indicates that the server is redirecting the user agent to a different
     * resource, as indicated by a URI in the Location header field, that is
     * intended to provide an indirect response to the original request.
     * @see [RFC7231#6.4.4](https://tools.ietf.org/html/rfc7231#section-6.4.4)
     */
    const SEE_OTHER = 303;

    /**
     * indicates that a conditional GET request has been received and would have
     * resulted in a 200 (OK) response if it were not for the fact that the
     * condition has evaluated to false.
     * @see [RFC7232#4.1](https://tools.ietf.org/html/rfc7232#section-4.1)
     */
    const NOT_MODIFIED = 304;

    /**
     * *deprecated*
     * @see [RFC7231#6.4.5](https://tools.ietf.org/html/rfc7231#section-6.4.5)
     */
    const USE_PROXY = 305;

    /**
     * indicates that the target resource resides temporarily under a different
     * URI and the user agent MUST NOT change the request method if it performs an
     * automatic redirection to that URI.
     * @see [RFC7231#6.4.7](https://tools.ietf.org/html/rfc7231#section-6.4.7)
     */
    const TEMPORARY_REDIRECT = 307;

    /**
     * indicates that the server cannot or will not process the request because
     * the received syntax is invalid, nonsensical, or exceeds some limitation on
     * what the server is willing to process.
     * @see [RFC7231#6.5.1](https://tools.ietf.org/html/rfc7231#section-6.5.1)
     */
    const BAD_REQUEST = 400;

    /**
     * indicates that the request has not been applied because it lacks valid
     * authentication credentials for the target resource.
     * @see [RFC7235#6.3.1](https://tools.ietf.org/html/rfc7235#section-3.1)
     */
    const UNAUTHORIZED = 401;

    /**
     * *reserved*
     * @see [RFC7231#6.5.2](https://tools.ietf.org/html/rfc7231#section-6.5.2)
     */
    const PAYMENT_REQUIRED = 402;

    /**
     * indicates that the server understood the request but refuses to authorize
     * it.
     * @see [RFC7231#6.5.3](https://tools.ietf.org/html/rfc7231#section-6.5.3)
     */
    const FORBIDDEN = 403;

    /**
     * indicates that the origin server did not find a current representation for
     * the target resource or is not willing to disclose that one exists.
     * @see [RFC7231#6.5.4](https://tools.ietf.org/html/rfc7231#section-6.5.4)
     */
    const NOT_FOUND = 404;

    /**
     * indicates that the method specified in the request-line is known by the
     * origin server but not supported by the target resource.
     * @see [RFC7231#6.5.5](https://tools.ietf.org/html/rfc7231#section-6.5.5)
     */
    const METHOD_NOT_ALLOWED = 405;

    /**
     * indicates that the target resource does not have a current representation
     * that would be acceptable to the user agent, according to the proactive
     * negotiation header fields received in the request, and the server is
     * unwilling to supply a default representation.
     * @see [RFC7231#6.5.6](https://tools.ietf.org/html/rfc7231#section-6.5.6)
     */
    const NOT_ACCEPTABLE = 406;

    /**
     * is similar to 401 (Unauthorized), but indicates that the client needs to
     * authenticate itself in order to use a proxy.
     * @see [RFC7235#3.2](https://tools.ietf.org/html/rfc7235#section-3.2)
     */
    const PROXY_AUTHENTICATION_REQUIRED = 407;

    /**
     * indicates that the server did not receive a complete request message within
     * the time that it was prepared to wait.
     * @see [RFC7231#6.5.7](https://tools.ietf.org/html/rfc7231#section-6.5.7)
     */
    const REQUEST_TIMEOUT = 408;

    /**
     * indicates that the request could not be completed due to a conflict with
     * the current state of the resource.
     * @see [RFC7231#6.5.8](https://tools.ietf.org/html/rfc7231#section-6.5.8)
     */
    const CONFLICT = 409;

    /**
     * indicates that access to the target resource is no longer available at the
     * origin server and that this condition is likely to be permanent.
     * @see [RFC7231#6.5.9](https://tools.ietf.org/html/rfc7231#section-6.5.9)
     */
    const GONE = 410;

    /**
     * indicates that the server refuses to accept the request without a defined
     * Content-Length.
     * @see [RFC7231#6.5.10](https://tools.ietf.org/html/rfc7231#section-6.5.10)
     */
    const LENGTH_REQUIRED = 411;

    /**
     * indicates that one or more preconditions given in the request header fields
     * evaluated to false when tested on the server.
     * @see [RFC7232#4.2](https://tools.ietf.org/html/rfc7232#section-4.2)
     */
    const PRECONDITION_FAILED = 412;

    /**
     * indicates that the server is refusing to process a request because the
     * request payload is larger than the server is willing or able to process.
     * @see [RFC7231#6.5.11](https://tools.ietf.org/html/rfc7231#section-6.5.11)
     */
    const PAYLOAD_TOO_LARGE = 413;

    /**
     * indicates that the server is refusing to service the request because the
     * request-target is longer than the server is willing to interpret.
     * @see [RFC7231#6.5.12](https://tools.ietf.org/html/rfc7231#section-6.5.12)
     */
    const URI_TOO_LONG = 414;

    /**
     * indicates that the origin server is refusing to service the request because
     * the payload is in a format not supported by the target resource for this
     * method.
     * @see [RFC7231#6.5.13](https://tools.ietf.org/html/rfc7231#section-6.5.13)
     */
    const UNSUPPORTED_MEDIA_TYPE = 415;

    /**
     * indicates that none of the ranges in the request's Range header field
     * overlap the current extent of the selected resource or that the set of
     * ranges requested has been rejected due to invalid ranges or an excessive
     * request of small or overlapping ranges.
     * @see [RFC7233#4.4](https://tools.ietf.org/html/rfc7233#section-4.4)
     */
    const RANGE_NOT_SATISFIABLE = 416;

    /**
     * indicates that the expectation given in the request's Expect header field
     * could not be met by at least one of the inbound servers.
     * @see [RFC7231#6.5.14](https://tools.ietf.org/html/rfc7231#section-6.5.14)
     */
    const EXPECTATION_FAILED = 417;

    /**
     * Any attempt to brew coffee with a teapot should result in the error code
     * 418 I'm a teapot.
     * @see [RFC2324#2.3.1](https://tools.ietf.org/html/rfc2324#section-2.3.1)
     */
    const I_M_A_TEAPOT = 418;

    /**
     * indicates that the server refuses to perform the request using the current
     * protocol but might be willing to do so after the client upgrades to a
     * different protocol.
     * @see [RFC7231#6.5.15](https://tools.ietf.org/html/rfc7231#section-6.5.15)
     */
    const UPGRADE_REQUIRED = 426;

    /**
     * indicates that the server encountered an unexpected condition that
     * prevented it from fulfilling the request.
     * @see [RFC7231#6.6.1](https://tools.ietf.org/html/rfc7231#section-6.6.1)
     */
    const INTERNAL_SERVER_ERROR = 500;

    /**
     * indicates that the server does not support the functionality required to
     * fulfill the request.
     * @see [RFC7231#6.6.2](https://tools.ietf.org/html/rfc7231#section-6.6.2)
     */
    const NOT_IMPLEMENTED = 501;

    /**
     * indicates that the server, while acting as a gateway or proxy, received an
     * invalid response from an inbound server it accessed while attempting to
     * fulfill the request.
     * @see [RFC7231#6.6.3](https://tools.ietf.org/html/rfc7231#section-6.6.3)
     */
    const BAD_GATEWAY = 502;

    /**
     * indicates that the server is currently unable to handle the request due to
     * a temporary overload or scheduled maintenance, which will likely be
     * alleviated after some delay.
     * @see [RFC7231#6.6.4](https://tools.ietf.org/html/rfc7231#section-6.6.4)
     */
    const SERVICE_UNAVAILABLE = 503;

    /**
     * indicates that the server, while acting as a gateway or proxy, did not
     * receive a timely response from an upstream server it needed to access in
     * order to complete the request.
     * @see [RFC7231#6.6.5](https://tools.ietf.org/html/rfc7231#section-6.6.5)
     */
    const GATEWAY_TIME_OUT = 504;

    /**
     * indicates that the server does not support, or refuses to support, the
     * protocol version that was used in the request message.
     * @see [RFC7231#6.6.6](https://tools.ietf.org/html/rfc7231#section-6.6.6)
     */
    const HTTP_VERSION_NOT_SUPPORTED = 505;

    /**
     * is an interim response used to inform the client that the server has
     * accepted the complete request, but has not yet completed it.
     * @see [RFC5218#10.1](https://tools.ietf.org/html/rfc2518#section-10.1)
     */
    const PROCESSING = 102;

    /**
     * provides status for multiple independent operations.
     * @see [RFC5218#10.2](https://tools.ietf.org/html/rfc2518#section-10.2)
     */
    const MULTI_STATUS = 207;

    /**
     * The server has fulfilled a GET request for the resource, and the response
     * is a representation of the result of one or more instance-manipulations
     * applied to the current instance.
     * @see [RFC3229#10.4.1](https://tools.ietf.org/html/rfc3229#section-10.4.1)
     */
    const IM_USED = 226;

    /**
     * The target resource has been assigned a new permanent URI and any future
     * references to this resource outght to use one of the enclosed URIs. [...]
     * This status code is similar to 301 Moved Permanently (Section 7.3.2 of
     * rfc7231), except that it does not allow rewriting the request method from
     * POST to GET.
     * @see [RFC7538](https://tools.ietf.org/html/rfc7538)
     */
    const PERMANENT_REDIRECT = 308;

    /**
     * means the server understands the content type of the request entity (hence
     * a 415(Unsupported Media Type) status code is inappropriate), and the syntax
     * of the request entity is correct (thus a 400 (Bad Request) status code is
     * inappropriate) but was unable to process the contained instructions.
     * @see [RFC5218#10.3](https://tools.ietf.org/html/rfc2518#section-10.3)
     */
    const UNPROCESSABLE_ENTITY = 422;

    /**
     * means the source or destination resource of a method is locked.
     * @see [RFC5218#10.4](https://tools.ietf.org/html/rfc2518#section-10.4)
     */
    const LOCKED = 423;

    /**
     * means that the method could not be performed on the resource because the
     * requested action depended on another action and that action failed.
     * @see [RFC5218#10.5](https://tools.ietf.org/html/rfc2518#section-10.5)
     */
    const FAILED_DEPENDENCY = 424;

    /**
     * indicates that the origin server requires the request to be conditional.
     * @see [RFC6585#3](https://tools.ietf.org/html/rfc6585#section-3)
     */
    const PRECONDITION_REQUIRED = 428;

    /**
     * indicates that the user has sent too many requests in a given amount of
     * time ("rate limiting").
     * @see [RFC6585#4](https://tools.ietf.org/html/rfc6585#section-4)
     */
    const TOO_MANY_REQUESTS = 429;

    /**
     * indicates that the server is unwilling to process the request because its
     * header fields are too large.
     * @see [RFC6585#5](https://tools.ietf.org/html/rfc6585#section-5)
     */
    const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

    /**
     * This status code indicates that the server is denying access to the
     * resource in response to a legal demand.
     * @see [draft-ietf-httpbis-legally-restricted-status](https://tools.ietf.org/html/draft-ietf-httpbis-legally-restricted-status)
     */
    const UNAVAILABLE_FOR_LEGAL_REASONS = 451;

    /**
     * indicates that the server has an internal configuration error: the chosen
     * variant resource is configured to engage in transparent content negotiation
     * itself, and is therefore not a proper end point in the negotiation process.
     * @see [RFC2295#8.1](https://tools.ietf.org/html/rfc2295#section-8.1)
     */
    const VARIANT_ALSO_NEGOTIATES = 506;

    /**
     * means the method could not be performed on the resource because the server
     * is unable to store the representation needed to successfully complete the
     * request.
     * @see [RFC5218#10.6](https://tools.ietf.org/html/rfc2518#section-10.6)
     */
    const INSUFFICIENT_STORAGE = 507;

    /**
     * indicates that the client needs to authenticate to gain network access.
     * @see [RFC6585#6](https://tools.ietf.org/html/rfc6585#section-6)
     */
    const NETWORK_AUTHENTICATION_REQUIRED = 511;

    /**
     * @param int $code
     * @return StatusCode
     * @throws Exception
     */
    public static function getInfoByCode($code)
    {
        switch ($code) {
            case 100: return(StatusCode::import(json_decode('{"code":"100","phrase":"Continue","description":"indicates that the initial part of a request has been received and has not yet been rejected by the server.","spec_title":"RFC7231#6.2.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.2.1"}')));
            case 101: return(StatusCode::import(json_decode('{"code":"101","phrase":"Switching Protocols","description":"indicates that the server understands and is willing to comply with the client\'s request, via the Upgrade header field, for a change in the application protocol being used on this connection.","spec_title":"RFC7231#6.2.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.2.2"}')));
            case 200: return(StatusCode::import(json_decode('{"code":"200","phrase":"OK","description":"indicates that the request has succeeded.","spec_title":"RFC7231#6.3.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.3.1"}')));
            case 201: return(StatusCode::import(json_decode('{"code":"201","phrase":"Created","description":"indicates that the request has been fulfilled and has resulted in one or more new resources being created.","spec_title":"RFC7231#6.3.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.3.2"}')));
            case 202: return(StatusCode::import(json_decode('{"code":"202","phrase":"Accepted","description":"indicates that the request has been accepted for processing, but the processing has not been completed.","spec_title":"RFC7231#6.3.3","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.3.3"}')));
            case 203: return(StatusCode::import(json_decode('{"code":"203","phrase":"Non-Authoritative Information","description":"indicates that the request was successful but the enclosed payload has been modified from that of the origin server\'s 200 (OK) response by a transforming proxy.","spec_title":"RFC7231#6.3.4","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.3.4"}')));
            case 204: return(StatusCode::import(json_decode('{"code":"204","phrase":"No Content","description":"indicates that the server has successfully fulfilled the request and that there is no additional content to send in the response payload body.","spec_title":"RFC7231#6.3.5","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.3.5"}')));
            case 205: return(StatusCode::import(json_decode('{"code":"205","phrase":"Reset Content","description":"indicates that the server has fulfilled the request and desires that the user agent reset the \"document view\", which caused the request to be sent, to its original state as received from the origin server.","spec_title":"RFC7231#6.3.6","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.3.6"}')));
            case 206: return(StatusCode::import(json_decode('{"code":"206","phrase":"Partial Content","description":"indicates that the server is successfully fulfilling a range request for the target resource by transferring one or more parts of the selected representation that correspond to the satisfiable ranges found in the requests\'s Range header field.","spec_title":"RFC7233#4.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7233#section-4.1"}')));
            case 300: return(StatusCode::import(json_decode('{"code":"300","phrase":"Multiple Choices","description":"indicates that the target resource has more than one representation, each with its own more specific identifier, and information about the alternatives is being provided so that the user (or user agent) can select a preferred representation by redirecting its request to one or more of those identifiers.","spec_title":"RFC7231#6.4.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.4.1"}')));
            case 301: return(StatusCode::import(json_decode('{"code":"301","phrase":"Moved Permanently","description":"indicates that the target resource has been assigned a new permanent URI and any future references to this resource ought to use one of the enclosed URIs.","spec_title":"RFC7231#6.4.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.4.2"}')));
            case 302: return(StatusCode::import(json_decode('{"code":"302","phrase":"Found","description":"indicates that the target resource resides temporarily under a different URI.","spec_title":"RFC7231#6.4.3","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.4.3"}')));
            case 303: return(StatusCode::import(json_decode('{"code":"303","phrase":"See Other","description":"indicates that the server is redirecting the user agent to a different resource, as indicated by a URI in the Location header field, that is intended to provide an indirect response to the original request.","spec_title":"RFC7231#6.4.4","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.4.4"}')));
            case 304: return(StatusCode::import(json_decode('{"code":"304","phrase":"Not Modified","description":"indicates that a conditional GET request has been received and would have resulted in a 200 (OK) response if it were not for the fact that the condition has evaluated to false.","spec_title":"RFC7232#4.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7232#section-4.1"}')));
            case 305: return(StatusCode::import(json_decode('{"code":"305","phrase":"Use Proxy","description":"*deprecated*","spec_title":"RFC7231#6.4.5","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.4.5"}')));
            case 307: return(StatusCode::import(json_decode('{"code":"307","phrase":"Temporary Redirect","description":"indicates that the target resource resides temporarily under a different URI and the user agent MUST NOT change the request method if it performs an automatic redirection to that URI.","spec_title":"RFC7231#6.4.7","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.4.7"}')));
            case 400: return(StatusCode::import(json_decode('{"code":"400","phrase":"Bad Request","description":"indicates that the server cannot or will not process the request because the received syntax is invalid, nonsensical, or exceeds some limitation on what the server is willing to process.","spec_title":"RFC7231#6.5.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.1"}')));
            case 401: return(StatusCode::import(json_decode('{"code":"401","phrase":"Unauthorized","description":"indicates that the request has not been applied because it lacks valid authentication credentials for the target resource.","spec_title":"RFC7235#6.3.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7235#section-3.1"}')));
            case 402: return(StatusCode::import(json_decode('{"code":"402","phrase":"Payment Required","description":"*reserved*","spec_title":"RFC7231#6.5.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.2"}')));
            case 403: return(StatusCode::import(json_decode('{"code":"403","phrase":"Forbidden","description":"indicates that the server understood the request but refuses to authorize it.","spec_title":"RFC7231#6.5.3","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.3"}')));
            case 404: return(StatusCode::import(json_decode('{"code":"404","phrase":"Not Found","description":"indicates that the origin server did not find a current representation for the target resource or is not willing to disclose that one exists.","spec_title":"RFC7231#6.5.4","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.4"}')));
            case 405: return(StatusCode::import(json_decode('{"code":"405","phrase":"Method Not Allowed","description":"indicates that the method specified in the request-line is known by the origin server but not supported by the target resource.","spec_title":"RFC7231#6.5.5","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.5"}')));
            case 406: return(StatusCode::import(json_decode('{"code":"406","phrase":"Not Acceptable","description":"indicates that the target resource does not have a current representation that would be acceptable to the user agent, according to the proactive negotiation header fields received in the request, and the server is unwilling to supply a default representation.","spec_title":"RFC7231#6.5.6","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.6"}')));
            case 407: return(StatusCode::import(json_decode('{"code":"407","phrase":"Proxy Authentication Required","description":"is similar to 401 (Unauthorized), but indicates that the client needs to authenticate itself in order to use a proxy.","spec_title":"RFC7235#3.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7235#section-3.2"}')));
            case 408: return(StatusCode::import(json_decode('{"code":"408","phrase":"Request Timeout","description":"indicates that the server did not receive a complete request message within the time that it was prepared to wait.","spec_title":"RFC7231#6.5.7","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.7"}')));
            case 409: return(StatusCode::import(json_decode('{"code":"409","phrase":"Conflict","description":"indicates that the request could not be completed due to a conflict with the current state of the resource.","spec_title":"RFC7231#6.5.8","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.8"}')));
            case 410: return(StatusCode::import(json_decode('{"code":"410","phrase":"Gone","description":"indicates that access to the target resource is no longer available at the origin server and that this condition is likely to be permanent.","spec_title":"RFC7231#6.5.9","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.9"}')));
            case 411: return(StatusCode::import(json_decode('{"code":"411","phrase":"Length Required","description":"indicates that the server refuses to accept the request without a defined Content-Length.","spec_title":"RFC7231#6.5.10","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.10"}')));
            case 412: return(StatusCode::import(json_decode('{"code":"412","phrase":"Precondition Failed","description":"indicates that one or more preconditions given in the request header fields evaluated to false when tested on the server.","spec_title":"RFC7232#4.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7232#section-4.2"}')));
            case 413: return(StatusCode::import(json_decode('{"code":"413","phrase":"Payload Too Large","description":"indicates that the server is refusing to process a request because the request payload is larger than the server is willing or able to process.","spec_title":"RFC7231#6.5.11","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.11"}')));
            case 414: return(StatusCode::import(json_decode('{"code":"414","phrase":"URI Too Long","description":"indicates that the server is refusing to service the request because the request-target is longer than the server is willing to interpret.","spec_title":"RFC7231#6.5.12","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.12"}')));
            case 415: return(StatusCode::import(json_decode('{"code":"415","phrase":"Unsupported Media Type","description":"indicates that the origin server is refusing to service the request because the payload is in a format not supported by the target resource for this method.","spec_title":"RFC7231#6.5.13","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.13"}')));
            case 416: return(StatusCode::import(json_decode('{"code":"416","phrase":"Range Not Satisfiable","description":"indicates that none of the ranges in the request\'s Range header field overlap the current extent of the selected resource or that the set of ranges requested has been rejected due to invalid ranges or an excessive request of small or overlapping ranges.","spec_title":"RFC7233#4.4","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7233#section-4.4"}')));
            case 417: return(StatusCode::import(json_decode('{"code":"417","phrase":"Expectation Failed","description":"indicates that the expectation given in the request\'s Expect header field could not be met by at least one of the inbound servers.","spec_title":"RFC7231#6.5.14","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.14"}')));
            case 418: return(StatusCode::import(json_decode('{"code":"418","phrase":"I\'m a teapot","description":"Any attempt to brew coffee with a teapot should result in the error code 418 I\'m a teapot.","spec_title":"RFC2324#2.3.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2324#section-2.3.1"}')));
            case 426: return(StatusCode::import(json_decode('{"code":"426","phrase":"Upgrade Required","description":"indicates that the server refuses to perform the request using the current protocol but might be willing to do so after the client upgrades to a different protocol.","spec_title":"RFC7231#6.5.15","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.5.15"}')));
            case 500: return(StatusCode::import(json_decode('{"code":"500","phrase":"Internal Server Error","description":"indicates that the server encountered an unexpected condition that prevented it from fulfilling the request.","spec_title":"RFC7231#6.6.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.6.1"}')));
            case 501: return(StatusCode::import(json_decode('{"code":"501","phrase":"Not Implemented","description":"indicates that the server does not support the functionality required to fulfill the request.","spec_title":"RFC7231#6.6.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.6.2"}')));
            case 502: return(StatusCode::import(json_decode('{"code":"502","phrase":"Bad Gateway","description":"indicates that the server, while acting as a gateway or proxy, received an invalid response from an inbound server it accessed while attempting to fulfill the request.","spec_title":"RFC7231#6.6.3","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.6.3"}')));
            case 503: return(StatusCode::import(json_decode('{"code":"503","phrase":"Service Unavailable","description":"indicates that the server is currently unable to handle the request due to a temporary overload or scheduled maintenance, which will likely be alleviated after some delay.","spec_title":"RFC7231#6.6.4","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.6.4"}')));
            case 504: return(StatusCode::import(json_decode('{"code":"504","phrase":"Gateway Time-out","description":"indicates that the server, while acting as a gateway or proxy, did not receive a timely response from an upstream server it needed to access in order to complete the request.","spec_title":"RFC7231#6.6.5","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.6.5"}')));
            case 505: return(StatusCode::import(json_decode('{"code":"505","phrase":"HTTP Version Not Supported","description":"indicates that the server does not support, or refuses to support, the protocol version that was used in the request message.","spec_title":"RFC7231#6.6.6","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7231#section-6.6.6"}')));
            case 102: return(StatusCode::import(json_decode('{"code":"102","phrase":"Processing","description":"is an interim response used to inform the client that the server has accepted the complete request, but has not yet completed it.","spec_title":"RFC5218#10.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2518#section-10.1"}')));
            case 207: return(StatusCode::import(json_decode('{"code":"207","phrase":"Multi-Status","description":"provides status for multiple independent operations.","spec_title":"RFC5218#10.2","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2518#section-10.2"}')));
            case 226: return(StatusCode::import(json_decode('{"code":"226","phrase":"IM Used","description":"The server has fulfilled a GET request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance.","spec_title":"RFC3229#10.4.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc3229#section-10.4.1"}')));
            case 308: return(StatusCode::import(json_decode('{"code":"308","phrase":"Permanent Redirect","description":"The target resource has been assigned a new permanent URI and any future references to this resource outght to use one of the enclosed URIs. [...] This status code is similar to 301 Moved Permanently (Section 7.3.2 of rfc7231), except that it does not allow rewriting the request method from POST to GET.","spec_title":"RFC7538","spec_href":"https:\/\/tools.ietf.org\/html\/rfc7538"}')));
            case 422: return(StatusCode::import(json_decode('{"code":"422","phrase":"Unprocessable Entity","description":"means the server understands the content type of the request entity (hence a 415(Unsupported Media Type) status code is inappropriate), and the syntax of the request entity is correct (thus a 400 (Bad Request) status code is inappropriate) but was unable to process the contained instructions.","spec_title":"RFC5218#10.3","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2518#section-10.3"}')));
            case 423: return(StatusCode::import(json_decode('{"code":"423","phrase":"Locked","description":"means the source or destination resource of a method is locked.","spec_title":"RFC5218#10.4","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2518#section-10.4"}')));
            case 424: return(StatusCode::import(json_decode('{"code":"424","phrase":"Failed Dependency","description":"means that the method could not be performed on the resource because the requested action depended on another action and that action failed.","spec_title":"RFC5218#10.5","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2518#section-10.5"}')));
            case 428: return(StatusCode::import(json_decode('{"code":"428","phrase":"Precondition Required","description":"indicates that the origin server requires the request to be conditional.","spec_title":"RFC6585#3","spec_href":"https:\/\/tools.ietf.org\/html\/rfc6585#section-3"}')));
            case 429: return(StatusCode::import(json_decode('{"code":"429","phrase":"Too Many Requests","description":"indicates that the user has sent too many requests in a given amount of time (\"rate limiting\").","spec_title":"RFC6585#4","spec_href":"https:\/\/tools.ietf.org\/html\/rfc6585#section-4"}')));
            case 431: return(StatusCode::import(json_decode('{"code":"431","phrase":"Request Header Fields Too Large","description":"indicates that the server is unwilling to process the request because its header fields are too large.","spec_title":"RFC6585#5","spec_href":"https:\/\/tools.ietf.org\/html\/rfc6585#section-5"}')));
            case 451: return(StatusCode::import(json_decode('{"code":"451","phrase":"Unavailable For Legal Reasons","description":"This status code indicates that the server is denying access to the resource in response to a legal demand.","spec_title":"draft-ietf-httpbis-legally-restricted-status","spec_href":"https:\/\/tools.ietf.org\/html\/draft-ietf-httpbis-legally-restricted-status"}')));
            case 506: return(StatusCode::import(json_decode('{"code":"506","phrase":"Variant Also Negotiates","description":"indicates that the server has an internal configuration error: the chosen variant resource is configured to engage in transparent content negotiation itself, and is therefore not a proper end point in the negotiation process.","spec_title":"RFC2295#8.1","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2295#section-8.1"}')));
            case 507: return(StatusCode::import(json_decode('{"code":"507","phrase":"Insufficient Storage","description":"means the method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request.","spec_title":"RFC5218#10.6","spec_href":"https:\/\/tools.ietf.org\/html\/rfc2518#section-10.6"}')));
            case 511: return(StatusCode::import(json_decode('{"code":"511","phrase":"Network Authentication Required","description":"indicates that the client needs to authenticate to gain network access.","spec_title":"RFC6585#6","spec_href":"https:\/\/tools.ietf.org\/html\/rfc6585#section-6"}')));
            default: throw new \Exception("Unknown code: " . $code);
        }
    }
}