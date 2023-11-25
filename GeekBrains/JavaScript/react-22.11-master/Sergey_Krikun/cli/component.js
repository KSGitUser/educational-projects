// скрипт для создания необходимых файлов в components автоматически
const path = require('path'); // пакет для обработки путей
const fs = require('fs'); // пакет для работы с файловой сиситемой

const minimist = require('minimist');

const args = minimist(process.argv.slice(2), {
  alias: {
    name: 'n',
  },
}); // первые два параметра нам не нужны, по этому отрезаем их с помощью slice()

const componentName = args.name; // присваиваем имя папки переданной из компандной строки

fs.mkdirSync(
  path.resolve(__dirname, '..', 'src', 'components', componentName)
); // создаем папку

const componentCode = `import './${componentName}.css';

import React, { PureComponent } from 'react';

export default class ${componentName} extends PureComponent {
  static defaultProps = {}

  render() {
    return (
      <div className="${componentName}"> </div>
    );
  }
}
`;

fs.writeFileSync(
  path.resolve(__dirname, '..', 'src', 'components', componentName, `${componentName}.jsx`), componentCode,
); // создаем файл jsx с вышенаписанным содржимым

fs.writeFileSync(
  path.resolve(__dirname, '..', 'src', 'components', componentName, `${componentName}.css`), `.${componentName} {}`,
); // создаем файл css

fs.writeFileSync(
  path.resolve(__dirname, '..', 'src', 'components', componentName, 'index.js'), `export default from './${componentName}.jsx';
    `,
); // создаем файл css
