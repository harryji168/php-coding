In JavaScript, a closure is a function that has access to its own scope, the outer function's scope, and the global scope. More specifically, a closure is created when an inner function tries to access the scope of an outer function.

Here's an example of a closure:

```javascript
function outerFunction(outerVariable) {
    return function innerFunction(innerVariable) {
        console.log('outerVariable:', outerVariable);
        console.log('innerVariable:', innerVariable);
    }
}

const newFunction = outerFunction('outside');
newFunction('inside');  // Logs: outerVariable: outside, innerVariable: inside
```

In this case, `innerFunction` is a closure that is created inside `outerFunction`. Even after `outerFunction` has finished execution, `innerFunction` still has access to `outerVariable` because a closure preserves the scope chain at the time the closure is created. The `newFunction` invocation retains access to the variable 'outside' from the `outerFunction` scope, even after `outerFunction` has finished execution.

Closures are useful because they let you associate some data (the environment) with a function that operates on that data. This has obvious parallels to object-oriented programming, where objects allow us to associate some data (the object's properties) with one or more methods.