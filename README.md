# 📚 Tuklas  
### *Ang Panimulang Bahagi*  
*A exclusive academic idea repository*

---

## 🧠 What is Tuklas?

**Tuklas** is a community-driven web platform designed exclusively for students to **discover, share, and refine ideas** for:

- 🎓 Thesis  
- 🛠 Capstone Projects  
- 🔬 Research Studies  

Rather than storing full papers, Tuklas focuses on **early-stage academic ideas**—helping students explore directions, avoid duplication, and build stronger proposals from the very beginning.

> *Tuklas means “to discover” — this platform represents the starting point of every academic journey.*

---

## 🎯 Core Goals

- Encourage **original thinking** and **academic integrity**
- Provide a **safe idea repository**, not a plagiarism hub
- Help students overcome the hardest part of research: **starting**
- Promote **idea lineage**, inspiration, and academic transparency

---

## ✨ Key Features

### 🔐 Exclusive Access
- Registration restricted to `@<university domain>` email addresses
- Ensures a trusted academic-only community

---

### 🧾 Structured Idea Posting
Each idea contains only essential academic components:
- Title
- Background of the Study
- Objectives
- Scope
- Limitations

❌ No full methodologies  
❌ No results or datasets  
✔ High-level ideas only

---

### 🤖 AI-Assisted Idea Creation
- Optional **AI Assistive Wizard**
- Helps students draft structured ideas through guided questions
- AI-generated content is clearly marked as **AI Assisted**
- Users must review and edit content before saving

---

### 🧬 Forking & Idea Lineage
- Students can **fork an idea** to create their own version
- Forked ideas are **independent** and owned by the forking user
- Original ideas are always credited via `parent_id`
- Encourages inspiration without overwriting or merging

---

### 🕒 Version History
- Every edit creates a new version snapshot
- Supports rollback and academic traceability
- Reinforces accountability and originality

---

### 🔍 Smart Search
- Full-text search on titles and backgrounds
- Helps students quickly discover relevant ideas

---

## 🛠 Tech Stack

| Layer | Technology |
|-----|-----------|
| Backend | Laravel |
| Frontend | Blade + Tailwind CSS |
| Database | MySQL |
| AI | Google Gemini (AI Studio) |
| Styling | Tailwind CSS |

---

## 🧩 Project Philosophy

Tuklas is **not**:  
❌ A thesis archive  
❌ A paper-sharing platform  
❌A plagiarism shortcut  

Tuklas **is**:
✔ A thinking tool  
✔ A discovery space  
✔ A starting line for research  

---

## 📌 Academic Integrity

- Ideas are intentionally **high-level**
- AI assistance is transparent and logged
- Forking preserves attribution
- No direct copying of completed research

This design aligns with **ethical research practices** and institutional expectations.

---

## 🚀 Getting Started (Development)

```bash
git clone https://github.com/jayveeinfinity/tuklas.git
cd tuklas
composer install
npm install
npm run dev
php artisan migrate
php artisan serve
