module.exports = {
    "extends": [
        "google",
        "plugin:react/recommended"
    ],
    "plugins": [
        "react",
        "import"
    ],
    "settings": {
        "react": {
            "createClass": "createReactClass",
            "pragma": "React",
            "version": "16.0",
            "flowVersion": "0.6.3"
        },
    },
    "parserOptions": {
        "ecmaVersion": 7,
        "sourceType": "module",
        "ecmaFeatures": {
            "jsx": true
        }
    },
    "parser": "babel-eslint",
    "rules": {
        "linebreak-style": [
            "error",

        ],
        "strict": 0,
        "object-curly-spacing": [
            2,
            "always",
            {
                "objectsInObjects": false,
                "arraysInObjects": false
            }
        ],
        "react/jsx-filename-extension": [
            1,
            {
                "extensions": [
                    ".js",
                    ".jsx"
                ]
            }
        ]
    }
};


