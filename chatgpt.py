from telegram import Update
from telegram.ext import ApplicationBuilder, CommandHandler, MessageHandler, filters, ContextTypes
import openai
import os
from dotenv import load_dotenv

# قراءة المفاتيح من ملف config.env
load_dotenv()
TELEGRAM_BOT_TOKEN = os.getenv("TELEGRAM_BOT_TOKEN")
OPENAI_API_KEY = os.getenv("OPENAI_API_KEY")
openai.api_key = OPENAI_API_KEY

# --- أوامر البوت ---
async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    await update.message.reply_text(
        "مرحبا! 🤖 أنا بوت ChatGPT.\nارسل أي سؤال وسأجيبك مباشرة!"
    )

async def help_command(update: Update, context: ContextTypes.DEFAULT_TYPE):
    await update.message.reply_text(
        "أرسل أي نص وسأرد عليك.\nمثال: ما هو الذكاء الاصطناعي؟"
    )

# الرد على أي رسالة نصية باستخدام ChatGPT
async def chat(update: Update, context: ContextTypes.DEFAULT_TYPE):
    user_message = update.message.text
    try:
        response = openai.ChatCompletion.create(
            model="gpt-3.5-turbo",
            messages=[
                {"role": "system", "content": "أنت مساعد ذكي يتحدث بالعربية."},
                {"role": "user", "content": user_message}
            ]
        )
        answer = response['choices'][0]['message']['content']
        await update.message.reply_text(answer)
    except Exception as e:
        await update.message.reply_text(f"حدث خطأ: {e}")

# --- إنشاء التطبيق ---
app = ApplicationBuilder().token(TELEGRAM_BOT_TOKEN).build()

# إضافة الأوامر والرسائل
app.add_handler(CommandHandler("start", start))
app.add_handler(CommandHandler("help", help_command))
app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, chat))

# تشغيل البوت
print("بوت ChatGPT يعمل الآن...")
app.run_polling()
