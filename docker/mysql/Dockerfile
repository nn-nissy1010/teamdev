FROM mysql:8.0

# 日本語ロケール設定（ここは変更なし）
RUN microdnf update && \
    microdnf install -y glibc-locale-source && \
    microdnf clean all && \
    localedef -i ja_JP -f UTF-8 ja_JP.UTF-8

ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8
ENV TZ Asia/Tokyo

# 設定ファイルをコピー
COPY ./docker/mysql/my.cnf /etc/my.cnf

# 【重要】権限を MySQL が要求する 644 (読み込み可能、書き込みは制限) に変更
RUN chmod 644 /etc/my.cnf
