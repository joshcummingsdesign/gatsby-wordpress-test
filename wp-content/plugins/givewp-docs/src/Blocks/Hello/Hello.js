const el = wp.element.createElement;
const useBlockProps = wp.blockEditor.useBlockProps;

wp.blocks.registerBlockType('givedocs/hello', {
  title: 'Hello World',
  icon: 'universal-access-alt',
  category: 'design',
  edit: () => el('p', {}, 'Hello World (from the editor).'),
  save: () => el('p', {}, 'Hello World (from the frontend).'),
});
