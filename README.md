# 📚 Skill Tracker API

A minimal, clean **Laravel 12** + **PostgreSQL** RESTful API to manage skills with tags, metadata, and full-text search capabilities.  
Designed to showcase:

- ✅ PostgreSQL `jsonb` usage
- ✅ Full-text search with `GIN` indexes
- ✅ Laravel API best practices

---

## 🚀 Features

- Create, view, update, and delete skills
- Assign multiple tags (stored as `jsonb`)
- Add flexible metadata (level, source, etc.)
- Full-text search across skill name and description
- Filter skills by associated tags
- Built using clean Eloquent scopes and resources
- Indexed for high performance with PostgreSQL GIN indexes

---

## 🧱 Tech Stack

- **Backend:** Laravel 12
- **Database:** PostgreSQL (using `jsonb`, `tsvector`)
- **Authentication:** None (open API for demo purposes)
- **API Format:** REST JSON

---

## 🗂 API Endpoints

| Method | Endpoint            | Description                   |
|--------|---------------------|-------------------------------|
| GET    | `/api/skills`       | List all skills (filterable) |
| POST   | `/api/skills`       | Create a new skill           |
| GET    | `/api/skills/{id}`  | Retrieve a single skill      |
| PUT    | `/api/skills/{id}`  | Update a skill               |
| DELETE | `/api/skills/{id}`  | Delete a skill               |

---

## 🔍 Filtering Options

### Search Skills by Text

