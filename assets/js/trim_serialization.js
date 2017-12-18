/**
 * This <server-travelohealth> project created by :
 * Name         : syafiq
 * Date / Time  : 11 August 2017, 12:15 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

/**
 * This code Generally from https://github.com/macek/jquery-serialize-object/issues/80 with babel conversion
 * Babel...
 * */

"use strict";

function _defineProperty(obj, key, value)
{
    if (key in obj)
    {
        Object.defineProperty(obj, key, {value: value, enumerable: true, configurable: true, writable: true});
    } else
    {
        obj[key] = value;
    }
    return obj;
}

var type = function type(x) {
    if (x === undefined)
    {
        return undefined;
    }
    if (x === null)
    {
        return null;
    }
    return x.constructor;
};

// define which values are to be considered "empty"
var isEmpty = function isEmpty(x) {
    switch (type(x))
    {
        case undefined:
            return true;
        case null:
            return true;
        case File :
            return ((x.name.length === 0) || (x.size === 0) || (x.type.length === 0));
        case Object:
            return isEmpty(Object.keys(x));
        case Array:
            return x.length === 0;
        case String:
            return x.length === 0;
    }
};

// removeEmptyValues(obj) - deeply remove all "empty" values
var removeEmptyValues = function removeEmptyValues(x) {
    return Object.keys(x).reduce(function (y, k) {
        if (isEmpty(x[k]))
        {
            return y;
        }
        if (type(x[k]) === Object)
        {
            return Object.assign(y, _defineProperty({}, k, removeEmptyValues(x[k])));
        }
        return Object.assign(y, _defineProperty({}, k, x[k]));
    }, {});
};

/**
 * End of code
 * */

var _slicedToArray = function () {
    function sliceIterator(arr, i)
    {
        var _arr = [];
        var _n   = true;
        var _d   = false;
        var _e   = undefined;
        try
        {
            for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true)
            {
                _arr.push(_s.value);
                if (i && _arr.length === i)
                {
                    break;
                }
            }
        } catch (err)
        {
            _d = true;
            _e = err;
        } finally
        {
            try
            {
                if (!_n && _i["return"])
                {
                    _i["return"]();
                }
            } finally
            {
                if (_d)
                {
                    throw _e;
                }
            }
        }
        return _arr;
    }

    return function (arr, i) {
        if (Array.isArray(arr))
        {
            return arr;
        } else if (Symbol.iterator in Object(arr))
        {
            return sliceIterator(arr, i);
        } else
        {
            throw new TypeError("Invalid attempt to destructure non-iterable instance");
        }
    };
}();

var removeEmptyFormDataValues = function removeEmptyFormDataValues(x) {
    var dk                        = [];
    var _iteratorNormalCompletion = true;
    var _didIteratorError         = false;
    var _iteratorError            = undefined;

    try
    {
        for (var _iterator = x.entries()[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true)
        {
            var _step$value = _slicedToArray(_step.value, 2),
                key         = _step$value[0],
                value       = _step$value[1];

            if (isEmpty(value))
            {
                dk.push(key);
            }
        }
    } catch (err)
    {
        _didIteratorError = true;
        _iteratorError    = err;
    } finally
    {
        try
        {
            if (!_iteratorNormalCompletion && _iterator.return)
            {
                _iterator.return();
            }
        } finally
        {
            if (_didIteratorError)
            {
                throw _iteratorError;
            }
        }
    }

    for (var i = -1, is = dk.length; ++i < is;)
    {
        x.delete(dk[i]);
    }
    return x;
};
