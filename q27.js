// a. Get the first paragraph using document.querySelector(tagname)
const firstParagraph = document.querySelector('p');
console.log('a. First paragraph:', firstParagraph.textContent);

// b. Get each paragraph using document.querySelector('#id')
const secondParagraph = document.querySelector('#second');
const thirdParagraph = document.querySelector('#third');
const fourthParagraph = document.querySelector('#fourth');
console.log('b. Second:', secondParagraph.textContent, '| Third:', thirdParagraph.textContent);

// c. Get all p elements as a NodeList using document.querySelectorAll(tagname)
const allParagraphs = document.querySelectorAll('p');
console.log('c. NodeList length:', allParagraphs.length);

// d. Loop through the NodeList and get the text content of each paragraph
allParagraphs.forEach((p, i) => {
  console.log(`d. Paragraph ${i + 1} text:`, p.textContent);
});

// e. Set text content of the fourth paragraph
fourthParagraph.textContent = 'Fourth Paragraph';
console.log('e. Fourth paragraph set to:', fourthParagraph.textContent);

// f. Set id and class attribute for all paragraphs using different methods
firstParagraph.setAttribute('id', 'first');
firstParagraph.className = 'para';
secondParagraph.setAttribute('class', 'para');
thirdParagraph.classList.add('para');
fourthParagraph.setAttribute('id', 'fourth');
fourthParagraph.setAttribute('class', 'para');

// g. Change style of each paragraph using JavaScript
allParagraphs.forEach(p => {
  p.style.fontSize = '18px';
  p.style.fontFamily = 'Arial, sans-serif';
  p.style.border = '1px solid #999';
  p.style.padding = '5px';
});
firstParagraph.style.color = 'darkblue';
firstParagraph.style.background = '#eef';

// h. Select all paragraphs, loop and color 1st & 3rd green, 2nd & 4th red
allParagraphs.forEach((p, index) => {
  if (index === 0 || index === 2) {
    p.style.color = 'green';
  } else {
    p.style.color = 'red';
  }
});

// i. Set text content, id and class to each paragraph (final pass, example)
allParagraphs.forEach((p, index) => {
  p.id = 'para' + (index + 1);
  p.className = 'paragraph-item';
});
console.log('i. Final paragraph ids/classes set.');
