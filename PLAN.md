# Project Plan 📝

## 1️⃣ Understanding of the Project
The goal is to create the foundation of an easy-to-use dashboard for licensed plastic surgeons (**Providers**) to manage their supplement business.

Through this dashboard, a provider should be able to:

- 📦 **Order and manage their product inventory**  
- 🗓️ **Keep track of patients’ surgery timelines and monthly supplement subscriptions**  
- 💳 **Record and renew payments**  
- 📊 **View real-time data about patients, stock levels, and billing**

The main focus is to build a clear backend structure using **Laravel**, which can later support a modern front-end and future features like reporting or analytics.

---

## 2️⃣ Assumptions
- 👤 Each provider and their staff will have their own login accounts.  
- 🏢 The product catalog will be managed by HSL LABS (**Admin**), and providers can only view and order existing products and manage their own inventory stock.  
- 💳 Payments will use a third-party gateway like **Stripe** or **PayPal** (for now, it can be mocked).  
- 📦 Each provider manages their own inventory (not shared globally).  
- 🧑‍⚕️ Every patient belongs to one provider.  
- ✉️ The system will send basic email notifications (e.g., when an order is placed).  
- 🎯 The first version will focus on **backend logic**, not UI design.

---

## 3️⃣ Main Modules to Build
- 🔑 **Authentication & Roles** – Login system for admin, provider, and staff users.  
- 🏥 **Provider Management** – Manage provider details, staff, and permissions.  
- 🧑‍⚕️ **Patient Management** – Store patient info, surgery dates, and subscriptions.  
- 📦 **Orders & Inventory** – Providers can place wholesale product orders and manage stock.  
- 💳 **Payments & Renewals** – Record payments, handle renewals, and generate invoices.  
- 📊 **Dashboard Overview** – Quick stats about patients, stock, and payments.

---

## 4️⃣ Questions to Ask Before Starting
- Will patients log in themselves, or only providers and their staff?  
- Which payment gateway should be used (**Stripe**, **PayPal**, etc.)?  
- Is there only one supplement product or multiple types?  
- How should inventory updates happen — in real-time or periodically?  
- Will providers only be allowed to order from existing products, or can they also request new products?  
- Should reports be downloadable (like PDF or Excel)?  
- Will design wireframes or Figma files be provided?

---

## 5️⃣ Rough Timeline 🗓️

| Week   | Focus Area              | Goal                                                                 |
|--------|------------------------|----------------------------------------------------------------------|
| 1️⃣     | Planning & Architecture | Understand requirements, design database and structure             |
| 2️⃣     | Setup & Core Models      | Create models (Providers, Patients, Orders, Inventory) and setup authentication. Build one complete flow — provider placing a wholesale order 📦 |
| 3️⃣     | Polish & Document        | Add tests ✅, refine structure, and prepare documentation (PLAN.md, ARCHITECTURE.md, README.md) |
