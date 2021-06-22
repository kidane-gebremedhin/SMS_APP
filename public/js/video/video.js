/**
 * @license
 * Video.js 7.6.6 <http://videojs.com/>
 * Copyright Brightcove, Inc. <https://www.brightcove.com/>
 * Available under Apache License Version 2.0
 * <https://github.com/videojs/video.js/blob/master/LICENSE>
 *
 * Includes vtt.js <https://github.com/mozilla/vtt.js>
 * Available under Apache License Version 2.0
 * <https://github.com/mozilla/vtt.js/blob/master/LICENSE>
 */

(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('global/window'), require('global/document')) :
  typeof define === 'function' && define.amd ? define(['global/window', 'global/document'], factory) :
  (global = global || self, global.videojs = factory(global.window, global.document));
}(this, function (window$1, document) {
  window$1 = window$1 && window$1.hasOwnProperty('default') ? window$1['default'] : window$1;
  document = document && document.hasOwnProperty('default') ? document['default'] : document;

  var version = "7.6.6";

  /**
   * @file create-logger.js
   * @module create-logger
   */

  var history = [];
  /**
   * Log messages to the console and history based on the type of message
   *
   * @private
   * @param  {string} type
   *         The name of the console method to use.
   *
   * @param  {Array} args
   *         The arguments to be passed to the matching console method.
   */

  var LogByTypeFactory = function LogByTypeFactory(name, log) {
    return function (type, level, args) {
      var lvl = log.levels[level];
      var lvlRegExp = new RegExp("^(" + lvl + ")$");

      if (type !== 'log') {
        // Add the type to the front of the message when it's not "log".
        args.unshift(type.toUpperCase() + ':');
      } // Add console prefix after adding to history.


      args.unshift(name + ':'); // Add a clone of the args at this point to history.

      if (history) {
        history.push([].concat(args));
      } // If there's no console then don't try to output messages, but they will
      // still be stored in history.


      if (!window$1.console) {
        return;
      } // Was setting these once outside of this function, but containing them
      // in the function makes it easier to test cases where console doesn't exist
      // when the module is executed.


      var fn = window$1.console[type];

      if (!fn && type === 'debug') {
        // Certain browsers don't have support for console.debug. For those, we
        // should default to the closest comparable log.
        fn = window$1.console.info || window$1.console.log;
      } // Bail out if there's no console or if this type is not allowed by the
      // current logging level.


      if (!fn || !lvl || !lvlRegExp.test(type)) {
        return;
      }

      fn[Array.isArray(args) ? 'apply' : 'call'](window$1.console, args);
    };
  };

  function createLogger(name) {
    // This is the private tracking variable for logging level.
    var level = 'info'; // the curried logByType bound to the specific log and history

    var logByType;
    /**
     * Logs plain debug messages. Similar to `console.log`.
     *
     * Due to [limitations](https://github.com/jsdoc3/jsdoc/issues/955#issuecomment-313829149)
     * of our JSDoc template, we cannot properly document this as both a function
     * and a namespace, so its function signature is documented here.
     *
     * #### Arguments
     * ##### *args
     * Mixed[]
     *
     * Any combination of values that could be passed to `console.log()`.
     *
     * #### Return Value
     *
     * `undefined`
     *
     * @namespace
     * @param    {Mixed[]} args
     *           One or more messages or objects that should be logged.
     */

    var log = function log() {
      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      logByType('log', level, args);
    }; // This is the logByType helper that the logging methods below use


    logByType = LogByTypeFactory(name, log);
    /**
     * Create a new sublogger which chains the old name to the new name.
     *
     * For example, doing `videojs.log.createLogger('player')` and then using that logger will log the following:
     * ```js
     *  mylogger('foo');
     *  // > VIDEOJS: player: foo
     * ```
     *
     * @param {string} name
     *        The name to add call the new logger
     * @return {Object}
     */

    log.createLogger = function (subname) {
      return createLogger(name + ': ' + subname);
    };
    /**
     * Enumeration of available logging levels, where the keys are the level names
     * and the values are `|`-separated strings containing logging methods allowed
     * in that logging level. These strings are used to create a regular expression
     * matching the function name being called.
     *
     * Levels provided by Video.js are:
     *
     * - `off`: Matches no calls. Any value that can be cast to `false` will have
     *   this effect. The most restrictive.
     * - `all`: Matches only Video.js-provided functions (`debug`, `log`,
     *   `log.warn`, and `log.error`).
     * - `debug`: Matches `log.debug`, `log`, `log.warn`, and `log.error` calls.
     * - `info` (default): Matches `log`, `log.warn`, and `log.error` calls.
     * - `warn`: Matches `log.warn` and `log.error` calls.
     * - `error`: Matches only `log.error` calls.
     *
     * @type {Object}
     */


    log.levels = {
      all: 'debug|log|warn|error',
      off: '',
      debug: 'debug|log|warn|error',
      info: 'log|warn|error',
      warn: 'warn|error',
      error: 'error',
      DEFAULT: level
    };
    /**
     * Get or set the current logging level.
     *
     * If a string matching a key from {@link module:log.levels} is provided, acts
     * as a setter.
     *
     * @param  {string} [lvl]
     *         Pass a valid level to set a new logging level.
     *
     * @return {string}
     *         The current logging level.
     */

    log.level = function (lvl) {
      if (typeof lvl === 'string') {
        if (!log.levels.hasOwnProperty(lvl)) {
          throw new Error("\"" + lvl + "\" in not a valid log level");
        }

        level = lvl;
      }

      return level;
    };
    /**
     * Returns an array containing everything that has been logged to the history.
     *
     * This array is a shallow clone of the internal history record. However, its
     * contents are _not_ cloned; so, mutating objects inside this array will
     * mutate them in history.
     *
     * @return {Array}
     */


    log.history = function () {
      return history ? [].concat(history) : [];
    };
    /**
     * Allows you to filter the history by the given logger name
     *
     * @param {string} fname
     *        The name to filter by
     *
     * @return {Array}
     *         The filtered list to return
     */


    log.history.filter = function (fname) {
      return (history || []).filter(function (historyItem) {
        // if the first item in each historyItem includes `fname`, then it's a match
        return new RegExp(".*" + fname + ".*").test(historyItem[0]);
      });
    };
    /**
     * Clears the internal history tracking, but does not prevent further history
     * tracking.
     */


    log.history.clear = function () {
      if (history) {
        history.length = 0;
      }
    };
    /**
     * Disable history tracking if it is currently enabled.
     */


    log.history.disable = function () {
      if (history !== null) {
        history.length = 0;
        history = null;
      }
    };
    /**
     * Enable history tracking if it is currently disabled.
     */


    log.history.enable = function () {
      if (history === null) {
        history = [];
      }
    };
    /**
     * Logs error messages. Similar to `console.error`.
     *
     * @param {Mixed[]} args
     *        One or more messages or objects that should be logged as an error
     */


    log.error = function () {
      for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
        args[_key2] = arguments[_key2];
      }

      return logByType('error', level, args);
    };
    /**
     * Logs warning messages. Similar to `console.warn`.
     *
     * @param {Mixed[]} args
     *        One or more messages or objects that should be logged as a warning.
     */


    log.warn = function () {
      for (var _len3 = arguments.length, args = new Array(_len3), _key3 = 0; _key3 < _len3; _key3++) {
        args[_key3] = arguments[_key3];
      }

      return logByType('warn', level, args);
    };
    /**
     * Logs debug messages. Similar to `console.debug`, but may also act as a comparable
     * log if `console.debug` is not available
     *
     * @param {Mixed[]} args
     *        One or more messages or objects that should be logged as debug.
     */


    log.debug = function () {
      for (var _len4 = arguments.length, args = new Array(_len4), _key4 = 0; _key4 < _len4; _key4++) {
        args[_key4] = arguments[_key4];
      }

      return logByType('debug', level, args);
    };

    return log;
  }

  /**
   * @file log.js
   * @module log
   */
  var log = createLogger('VIDEOJS');
  var createLogger$1 = log.createLogger;

  /**
   * @file obj.js
   * @module obj
   */

  /**
   * @callback obj:EachCallback
   *
   * @param {Mixed} value
   *        The current key for the object that is being iterated over.
   *
   * @param {string} key
   *        The current key-value for object that is being iterated over
   */

  /**
   * @callback obj:ReduceCallback
   *
   * @param {Mixed} accum
   *        The value that is accumulating over the reduce loop.
   *
   * @param {Mixed} value
   *        The current key for the object that is being iterated over.
   *
   * @param {string} key
   *        The current key-value for object that is being iterated over
   *
   * @return {Mixed}
   *         The new accumulated value.
   */
  var toString = Object.prototype.toString;
  /**
   * Get the keys of an Object
   *
   * @param {Object}
   *        The Object to get the keys from
   *
   * @return {string[]}
   *         An array of the keys from the object. Returns an empty array if the
   *         object passed in was invalid or had no keys.
   *
   * @private
   */

  var keys = function keys(object) {
    return isObject(object) ? Object.keys(object) : [];
  };
  /**
   * Array-like iteration for objects.
   *
   * @param {Object} object
   *        The object to iterate over
   *
   * @param {obj:EachCallback} fn
   *        The callback function which is called for each key in the object.
   */


  function each(object, fn) {
    keys(object).forEach(function (key) {
      return fn(object[key], key);
    });
  }
  /**
   * Array-like reduce for objects.
   *
   * @param {Object} object
   *        The Object that you want to reduce.
   *
   * @param {Function} fn
   *         A callback function which is called for each key in the object. It
   *         receives the accumulated value and the per-iteration value and key
   *         as arguments.
   *
   * @param {Mixed} [initial = 0]
   *        Starting value
   *
   * @return {Mixed}
   *         The final accumulated value.
   */

  function reduce(object, fn, initial) {
    if (initial === void 0) {
      initial = 0;
    }

    return keys(object).reduce(function (accum, key) {
      return fn(accum, object[key], key);
    }, initial);
  }
  /**
   * Object.assign-style object shallow merge/extend.
   *
   * @param  {Object} target
   * @param  {Object} ...sources
   * @return {Object}
   */

  function assign(target) {
    for (var _len = arguments.length, sources = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
      sources[_key - 1] = arguments[_key];
    }

    if (Object.assign) {
      return Object.assign.apply(Object, [target].concat(sources));
    }

    sources.forEach(function (source) {
      if (!source) {
        return;
      }

      each(source, function (value, key) {
        target[key] = value;
      });
    });
    return target;
  }
  /**
   * Returns whether a value is an object of any kind - including DOM nodes,
   * arrays, regular expressions, etc. Not functions, though.
   *
   * This avoids the gotcha where using `typeof` on a `null` value
   * results in `'object'`.
   *
   * @param  {Object} value
   * @return {boolean}
   */

  function isObject(value) {
    return !!value && typeof value === 'object';
  }
  /**
   * Returns whether an object appears to be a "plain" object - that is, a
   * direct instance of `Object`.
   *
   * @param  {Object} value
   * @return {boolean}
   */

  function isPlain(value) {
    return isObject(value) && toString.call(value) === '[object Object]' && value.constructor === Object;
  }

  /**
   * @file computed-style.js
   * @module computed-style
   */
  /**
   * A safe getComputedStyle.
   *
   * This is needed because in Firefox, if the player is loaded in an iframe with
   * `display:none`, then `getComputedStyle` returns `null`, so, we do a
   * null-check to make sure that the player doesn't break in these cases.
   *
   * @function
   * @param    {Element} el
   *           The element you want the computed style of
   *
   * @param    {string} prop
   *           The property name you want
   *
   * @see      https://bugzilla.mozilla.org/show_bug.cgi?id=548397
   */

  function computedStyle(el, prop) {
    if (!el || !prop) {
      return '';
    }

    if (typeof window$1.getComputedStyle === 'function') {
      var computedStyleValue = window$1.getComputedStyle(el);
      return computedStyleValue ? computedStyleValue.getPropertyValue(prop) || computedStyleValue[prop] : '';
    }

    return '';
  }

  /**
   * @file dom.js
   * @module dom
   */
  /**
   * Detect if a value is a string with any non-whitespace characters.
   *
   * @private
   * @param  {string} str
   *         The string to check
   *
   * @return {boolean}
   *         Will be `true` if the string is non-blank, `false` otherwise.
   *
   */

  function isNonBlankString(str) {
    return typeof str === 'string' && /\S/.test(str);
  }
  /**
   * Throws an error if the passed string has whitespace. This is used by
   * class methods to be relatively consistent with the classList API.
   *
   * @private
   * @param  {string} str
   *         The string to check for whitespace.
   *
   * @throws {Error}
   *         Throws an error if there is whitespace in the string.
   */


  function throwIfWhitespace(str) {
    if (/\s/.test(str)) {
      throw new Error('class has illegal whitespace characters');
    }
  }
  /**
   * Produce a regular expression for matching a className within an elements className.
   *
   * @private
   * @param  {string} className
   *         The className to generate the RegExp for.
   *
   * @return {RegExp}
   *         The RegExp that will check for a specific `className` in an elements
   *         className.
   */


  function classRegExp(className) {
    return new RegExp('(^|\\s)' + className + '($|\\s)');
  }
  /**
   * Whether the current DOM interface appears to be real (i.e. not simulated).
   *
   * @return {boolean}
   *         Will be `true` if the DOM appears to be real, `false` otherwise.
   */


  function isReal() {
    // Both document and window will never be undefined thanks to `global`.
    return document === window$1.document;
  }
  /**
   * Determines, via duck typing, whether or not a value is a DOM element.
   *
   * @param  {Mixed} value
   *         The value to check.
   *
   * @return {boolean}
   *         Will be `true` if the value is a DOM element, `false` otherwise.
   */

  function isEl(value) {
    return isObject(value) && value.nodeType === 1;
  }
  /**
   * Determines if the current DOM is embedded in an iframe.
   *
   * @return {boolean}
   *         Will be `true` if the DOM is embedded in an iframe, `false`
   *         otherwise.
   */

  function isInFrame() {
    // We need a try/catch here because Safari will throw errors when attempting
    // to get either `parent` or `self`
    try {
      return window$1.parent !== window$1.self;
    } catch (x) {
      return true;
    }
  }
  /**
   * Creates functions to query the DOM using a given method.
   *
   * @private
   * @param   {string} method
   *          The method to create the query with.
   *
   * @return  {Function}
   *          The query method
   */

  function createQuerier(method) {
    return function (selector, context) {
      if (!isNonBlankString(selector)) {
        return document[method](null);
      }

      if (isNonBlankString(context)) {
        context = document.querySelector(context);
      }

      var ctx = isEl(context) ? context : document;
      return ctx[method] && ctx[method](selector);
    };
  }
  /**
   * Creates an element and applies properties, attributes, and inserts content.
   *
   * @param  {string} [tagName='div']
   *         Name of tag to be created.
   *
   * @param  {Object} [properties={}]
   *         Element properties to be applied.
   *
   * @param  {Object} [attributes={}]
   *         Element attributes to be applied.
   *
   * @param {module:dom~ContentDescriptor} content
   *        A content descriptor object.
   *
   * @return {Element}
   *         The element that was created.
   */


  function createEl(tagName, properties, attributes, content) {
    if (tagName === void 0) {
      tagName = 'div';
    }

    if (properties === void 0) {
      properties = {};
    }

    if (attributes === void 0) {
      attributes = {};
    }

    var el = document.createElement(tagName);
    Object.getOwnPropertyNames(properties).forEach(function (propName) {
      var val = properties[propName]; // See #2176
      // We originally were accepting both properties and attributes in the
      // same object, but that doesn't work so well.

      if (propName.indexOf('aria-') !== -1 || propName === 'role' || propName === 'type') {
        log.warn('Setting attributes in the second argument of createEl()\n' + 'has been deprecated. Use the third argument instead.\n' + ("createEl(type, properties, attributes). Attempting to set " + propName + " to " + val + "."));
        el.setAttribute(propName, val); // Handle textContent since it's not supported everywhere and we have a
        // method for it.
      } else if (propName === 'textContent') {
        textContent(el, val);
      } else {
        el[propName] = val;
      }
    });
    Object.getOwnPropertyNames(attributes).forEach(function (attrName) {
      el.setAttribute(attrName, attributes[attrName]);
    });

    if (content) {
      appendContent(el, content);
    }

    return el;
  }
  /**
   * Injects text into an element, replacing any existing contents entirely.
   *
   * @param  {Element} el
   *         The element to add text content into
   *
   * @param  {string} text
   *         The text content to add.
   *
   * @return {Element}
   *         The element with added text content.
   */

  function textContent(el, text) {
    if (typeof el.textContent === 'undefined') {
      el.innerText = text;
    } else {
      el.textContent = text;
    }

    return el;
  }
  /**
   * Insert an element as the first child node of an