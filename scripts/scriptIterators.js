const news = [
    {
      id: 1,
      title: "В Україні запроваджено нову освітню реформу",
      author: "Ірина Коваленко",
      date: "2025-10-08",
      content: "Міністерство освіти оголосило нову реформу, яка передбачає зміни у шкільній програмі.",
      likes: 123,
      tags: ["освіта", "реформа", "уряд"],
      comments: [
        {
          user: "andrii23",
          text: "Цікаво, як це вплине на учнів.",
          date: "2025-10-08"
        },
        {
          user: "olena_p",
          text: "Сподіваюся, це буде на краще.",
          date: "2025-10-08"
        }
      ]
    },
    {
      id: 2,
      title: "У Києві відкрили новий парк",
      author: "Олександр Шевченко",
      date: "2025-10-07",
      content: "На Лівому березі столиці з’явився новий сучасний парк з дитячими майданчиками та велодоріжками.",
      likes: 87,
      tags: ["Київ", "екологія", "місто"],
      comments: [
        {
          user: "greenlover",
          text: "Дуже тішить, що з'являються зелені зони!",
          date: "2025-10-07"
        }
      ]
    },
    {
      id: 3,
      title: "Світовий банк підвищив прогноз зростання ВВП України",
      author: "Марія Іванова",
      date: "2025-10-06",
      content: "За новими даними, економіка України демонструє стабільне зростання завдяки реформам та інвестиціям.",
      likes: 205,
      tags: ["економіка", "Україна", "прогноз"],
      comments: []
    }
];

// Функція, яка нам виведе на сторінку новини
const showNews = (arr) => {
    const div = document.getElementById('div');
    div.innerHTML = ''; // очищення

    // список заголовків усіх новин
    const titles = news.map(arr => arr.title);
    console.log(titles);

    // Виведемо через reduce
    div.innerHTML += titles.reduce((text, title) => text += ('<br>'+ title));

    for (const article of arr) {
        // деструктуризуємо коментарі
        const commentsHtml = article.comments.map(({ user, text }) => {
            return `<li><strong>${user}:</strong> ${text}</li>`;
        }).join('');

        div.innerHTML += `
            <div class="article">
                <h2>${article.title}</h2>
                <div>${article.content}</div>
                <i>${article.author} ${article.date}</i>
                <div><strong>Лайки:</strong> ❤️ ${article.likes}</div>
                <div><strong>Теги:</strong> ${article.tags.map(tag => `#${tag}`).join(' ')}</div>
                ${commentsHtml
                    ? `<div><strong>Коментарі:</strong><ul>${commentsHtml}</ul></div>`
                    : `<div><em>Немає коментарів</em></div>`}
            </div>
        `;
    }
};

// Рендеримо оригінальний масив
document.getElementById('sortOriginal').addEventListener(
    'click',
    () => showNews(news)
)

// Сортуємо по заголовку статті
document.getElementById('sortByName').addEventListener(
    'click',
    () => showNews(news.toSorted((a,b) => a.title.localeCompare(b.title)))
)

// Фільтруємо по заголовку статті
let inputTitleSearch = document.getElementById('filterbyName');
inputTitleSearch.addEventListener(
    'input',
    () =>  {
        const pattern = new RegExp(inputTitleSearch.value, 'ig'); // створюємо RegExp з введеного тексту
        const filteredNews = news.filter(article => pattern.test(article.title));

        showNews(filteredNews);
    }
)

// Фільтруємо по автору
let inputAuthorSearch = document.getElementById('filterbyAuthor');
inputAuthorSearch.addEventListener(
    'input',
    () =>  {
        const pattern = new RegExp(inputAuthorSearch.value, 'ig'); // створюємо RegExp з введеного тексту
        const filteredNews = news.filter(article => pattern.test(article.author));

        showNews(filteredNews);
    }
)

showNews(news);